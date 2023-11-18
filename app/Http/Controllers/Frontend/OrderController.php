<?php

namespace App\Http\Controllers\Frontend;

use ZipArchive;
use App\Models\ImgExtension;
use App\Models\ServiceImage;
use Illuminate\Http\Request;
use App\Services\OmnipayService;
use App\Http\Controllers\Controller;
use App\Services\TwoCheckoutService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as FacadesFile;
use App\Models\{Order, Button, OrderServiceNote, OrderServiceTime, Retouch, OrderService, OrderDetails, Service};

class OrderController extends Controller
{
    public function __construct(protected TwoCheckoutService $twoCheckoutService)
    {
        $this->twoCheckoutService = $twoCheckoutService;
    }
    
    public function index()
    {
        $retouch = Retouch::whereUserId(get_user_data()->id)->latest()->first();
        $order = Order::create([
            'user_id' => get_user_data()->id,
            'slug' => mt_rand(1000000, 9999999),
            'retouch_id' => $retouch->id,
        ]);
        $services = OrderService::active()->select('id', 'name', 'price')->get();
        $payment_btn = Button::whereType('payment')->get();
        return view('website.dashboard.order', compact('order', 'services', 'payment_btn'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $services = OrderService::active()->select('id', 'name', 'price')->get();
        $selectedServices = $services->whereIn('id', $order->order_service_id)->all();
        foreach ($selectedServices as &$service) {
            $photos = 2;
            $serviceCost = $service->price;
            $service->photos = $photos;
        }
        $totalCost = collect($selectedServices)->sum('serviceTotalCost');
        $orderServiceTimes = OrderServiceTime::active()->latest()->get(['id', 'name', 'notes', 'price']);
        $payment_btn = Button::whereStatus(true)->whereType('payment')->get();
        return view('website.dashboard.orderShow', compact('order', 'services', 'selectedServices', 'orderServiceTimes', 'totalCost', 'payment_btn'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->only(['order_service_id']));
        return redirect()->route('website.orders.show', $order->id);
    }

    public function deleteService($id, $order_id)
    {
        $data = Order::findOrFail($order_id);
        $data->order_service_id = array_values(array_filter($data->order_service_id, function ($item) use ($id) {
            return $item != $id;
        }));
        $data->save();
        return redirect()->back();
    }


    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('website.orders.index')->with('success', 'Order deleted successfully');
    }

    public function updateDetails(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($request->proceed == "paypal") {
            foreach ($request->service_id as $key => $service) {
                $userName = get_user_data()->name;
                $orderService = OrderService::findOrFail($service);
                $orderServiceAme = $orderService->name;
                $propertyName = $orderServiceAme . '_img';
    
                $referencePropertyName = $orderServiceAme . '_refs_img';
                $counts = count($request->$propertyName);
    
                $ordersTimerId = isset($request->order_service_time_id) ? $request->order_service_time_id[$key] : null;
                $countImage = $counts;
                // Base image
                if ($request->hasFile($propertyName)) {
                    $images = $request->file($propertyName);
                    $allowedExtensions = ImgExtension::pluck('ext')->toArray();
                    foreach ($images as $image) {
                        $imageExtension = $image->getClientOriginalExtension();
                        if (!in_array($imageExtension, $allowedExtensions))
                            return redirect()->back()->withErrors(['error' => 'img ext not allowed'])->withInput();
                        $hashedFileName = $orderService->name . '_' . $image->hashName();
                        $filePath = $userName . '/' . $order->slug . '/' . $orderService->name . '/' . $hashedFileName;
                        Storage::disk('service_images')->put($filePath, file_get_contents($image));
                        $photo = new ServiceImage([
                            'order_id' => $order->id,
                            'order_service_id' => $orderService->id,
                            'image_path' => $filePath,
                            'type' => 'main'
                        ]);
                        $photo->save();
                    }
                }
    
                // Referance image
                // if ($request->hasFile($referencePropertyName)) {
                //     $images = $request->file($referencePropertyName);
                //     $allowedExtensions = ImgExtension::pluck('ext')->toArray();
                //     foreach ($images as $image) {
                //         $imageExtension = $image->getClientOriginalExtension();
                //         if (!in_array($imageExtension, $allowedExtensions)) 
                //             return redirect()->back()->withErrors(['error' => 'img ext not allowed'])->withInput();
                //         $hashedFileName = $orderService->name . '_reference' . '_' . $image->hashName();
                //         $filePath = $userName . '/' . $order->slug . '/' . $orderService->name . '/' . $hashedFileName;
                //         Storage::disk('service_images')->put($filePath, file_get_contents($image));
                //         $photo = new ServiceImage([
                //             'order_id' => $order->id,
                //             'order_service_id' => $orderService->id,
                //             'image_path' => $filePath,
                //             'type' => 'referance'
                //         ]);
                //         $photo->save();
                //     }
                // }
                $orderDetails = OrderDetails::create([
                    'order_id' => $order->id,
                    'order_service_id' => $orderService->id,
                    'price_offer' => $ordersTimerId,
                    'photo_count' => $countImage,
                    'total' => ($countImage * $orderService->price) + ($ordersTimerId ? ($countImage * OrderServiceTime::findOrFail($ordersTimerId)->price) : 0),
                    'order_status' => OrderDetails::NEW_ORDER
                ]);
                $orderServiceNotes = OrderServiceNote::create([
                    'order_id' => $order->id,
                    'order_service_id' => $service,
                    'order_service_time_id' => $ordersTimerId,
                    'notes' => $request->notes[$key]
                ]);
            }
            $this->createZipFile($orderId);
            $this->proceedToPayment($order);
        }

        if($request->chehoutProceed == "checkout") {
            dd('thanks u r in 2Checkout');
            foreach ($request->service_id as $key => $service) {
                $userName = get_user_data()->name;
                $orderService = OrderService::findOrFail($service);
                $orderServiceAme = $orderService->name;
                $propertyName = $orderServiceAme . '_img';
    
                $referencePropertyName = $orderServiceAme . '_refs_img';
                $counts = count($request->$propertyName);
    
                $ordersTimerId = isset($request->order_service_time_id) ? $request->order_service_time_id[$key] : null;
                $countImage = $counts;
                // Base image
                if ($request->hasFile($propertyName)) {
                    $images = $request->file($propertyName);
                    $allowedExtensions = ImgExtension::pluck('ext')->toArray();
                    foreach ($images as $image) {
                        $imageExtension = $image->getClientOriginalExtension();
                        if (!in_array($imageExtension, $allowedExtensions))
                            return redirect()->back()->withErrors(['error' => 'img ext not allowed'])->withInput();
                        $hashedFileName = $orderService->name . '_' . $image->hashName();
                        $filePath = $userName . '/' . $order->slug . '/' . $orderService->name . '/' . $hashedFileName;
                        Storage::disk('service_images')->put($filePath, file_get_contents($image));
                        $photo = new ServiceImage([
                            'order_id' => $order->id,
                            'order_service_id' => $orderService->id,
                            'image_path' => $filePath,
                            'type' => 'main'
                        ]);
                        $photo->save();
                    }
                }
    
                // Referance image
                // if ($request->hasFile($referencePropertyName)) {
                //     $images = $request->file($referencePropertyName);
                //     $allowedExtensions = ImgExtension::pluck('ext')->toArray();
                //     foreach ($images as $image) {
                //         $imageExtension = $image->getClientOriginalExtension();
                //         if (!in_array($imageExtension, $allowedExtensions)) 
                //             return redirect()->back()->withErrors(['error' => 'img ext not allowed'])->withInput();
                //         $hashedFileName = $orderService->name . '_reference' . '_' . $image->hashName();
                //         $filePath = $userName . '/' . $order->slug . '/' . $orderService->name . '/' . $hashedFileName;
                //         Storage::disk('service_images')->put($filePath, file_get_contents($image));
                //         $photo = new ServiceImage([
                //             'order_id' => $order->id,
                //             'order_service_id' => $orderService->id,
                //             'image_path' => $filePath,
                //             'type' => 'referance'
                //         ]);
                //         $photo->save();
                //     }
                // }
                $orderDetails = OrderDetails::create([
                    'order_id' => $order->id,
                    'order_service_id' => $orderService->id,
                    'price_offer' => $ordersTimerId,
                    'photo_count' => $countImage,
                    'total' => ($countImage * $orderService->price) + ($ordersTimerId ? ($countImage * OrderServiceTime::findOrFail($ordersTimerId)->price) : 0),
                    'order_status' => OrderDetails::NEW_ORDER
                ]);
                $orderServiceNotes = OrderServiceNote::create([
                    'order_id' => $order->id,
                    'order_service_id' => $service,
                    'order_service_time_id' => $ordersTimerId,
                    'notes' => $request->notes[$key]
                ]);
            }
            $this->createZipFile($orderId);
            $this->proceedCheckoutPayment($order);
        }
      
    
       
        return redirect()->back()->with('success', 'Order details updated successfully');
    }


    private function proceedCheckoutPayment($order) {
        $total = OrderDetails::where('order_id', $order->id)->sum('total');
        $tokenData = $this->twoCheckoutService->generateToken($order->id, $total, 'USD');
        $response = $this->twoCheckoutService->purchase([
            'token' => $tokenData['token'],
        ]);
    }
    
    private function proceedToPayment($order)
    {
        $total = OrderDetails::where('order_id', $order->id)->sum('total');
        $omniPay = new OmnipayService('PayPal_Express');
        $response = $omniPay->purchase([
            'amount' => $total,
            'currency' => 'USD',
            'cancelUrl' => $omniPay->getCancelUrl($order->id),
            'returnUrl' => $omniPay->getReturnUrl($order->id),
        ]);
        if ($response->isRedirect()) {
            $response->redirect();
        }
        $response->getMessage();
    }

    public function createZipFile($order_id)
    {
        $order = Order::findOrFail($order_id);
        $user = $order->user;
        $zipFileName = public_path('dashboard/img/order/' . $user->name . '/' . $order->slug . '.zip');
        $dirPath = public_path('dashboard/img/order/' . $user->name . '/' . $order->slug);

        if (is_dir($dirPath) && count(glob($dirPath . '/*'))) {
            $zip = new ZipArchive;
            if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
                $files = FacadesFile::allFiles($dirPath);

                if (count($files) > 0) {
                    foreach ($files as $file) {
                        $fileName = basename($file);
                        $zip->addFile($file, $fileName);
                    }
                    $zip->close();
                }
            }
        }

        //\Mail::to($user->email)->send(new \App\Mail\MyTestMail($order));
    }

    public function checkout_now()
    {
    }

    public function cancelled($order_id)
    {
        $order = OrderDetails::whereOrderId($order_id)->first();
        $order->update([
            'order_status' => OrderDetails::CANCELED
        ]);
        return redirect()->route('website.orders.show', $order->order_id);
    }

    public function completed($order_id)
    {
        $order = OrderDetails::whereOrderId($order_id)->first();
        $omniPay = new OmnipayService('PayPal_Express');
        $response = $omniPay->complete([
            'amount' => $order->total,
            'transactionId' => $order->id,
            'currency' => 'USD',
            'cancelUrl' => $omniPay->getCancelUrl($order->id),
            'returnUrl' => $omniPay->getReturnUrl($order->id),
            //'notifyUrl' => $omniPay->getNotifyUrl($order->id),
        ]);
        if ($response->isSuccessful()) {
            $order->update([
                'order_status' => OrderDetails::PAYMENT_COMPLETED
            ]);
            return $response->getTransactionReference();
        }
    }

    public function webhook($order, $env)
    {
    }

}