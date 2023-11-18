<?php
namespace App\Http\Controllers\Backend;
use App\Models\{Order};
use App\DataTables\OrderDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class OrderController {
    public function index(OrderDatatable $order) {
        return $order->render('admin.orders.index', ['title' => 'orders']);
    }
    
    public function show($id) {
        $order = Order::findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, $id) {
        $order = Order::find($id);
        if (!$order)
            return redirect()->back()->with('error', 'Order not found');
        $order->type = $request->input('type');
        $order->save();
        return redirect()->route('orders.index')->with('success', 'Order status updated successfully');
    }
    
     public function destroy(string $id) {
        try {
          
            $services = Order::findOrFail($id);
            $services->delete();
      

        } catch (\Exception $e) {
       
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
        Session::flash('message', 'data Deleted success');
        Session::flash('alert-class', 'alert-danger');
        return redirect()->back()->with('success', 'Delete Successfully Slider');
    }
}