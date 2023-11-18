<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ButtonDataTable;
use App\Models\Button;
use Illuminate\Support\Facades\{DB, Session};
class ButtonController extends Controller {
    public function index(ButtonDataTable $button) {
        return $button->render('admin.buttons.index', ['title' => 'Buttons']);
    }
    
    public function store(Request $request) {
        try {
            $type = $request->input('type');
            $url = ($type == 'payment') ? null : $request->input('url');
            $existingHeaderButtonsCount = Button::where('type', 'header')->count();
            $existingServicesButtonsCount = Button::where('type', 'service')->count();
            $existingPaymentsButtonsCount = Button::where('type', 'payment')->count();
            if (($type == 'header' && $existingHeaderButtonsCount >= 2) ||
                ($type == 'service' && $existingServicesButtonsCount >= 2) ||
                ($type == 'payment' && $existingPaymentsButtonsCount >= 2)) {
                return redirect()->back()->with('error', 'You cannot add more buttons of type ' . $type);
            }
            $requestData = $request->except('url');
            if ($url !== null) 
                $requestData['url'] = $url;
            Button::create($requestData);
            Session::flash('message', 'Data create success');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Try again later. Something went wrong.');
        }
    }
    

    public function update(Request $request, $id) {
        try {
            $orderService = Button::findorfail($id);
            $orderService->update($request->input());
            Session::flash('message', 'data updated success');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
    }

    public function destroy(string $id) {
        try {
            DB::beginTransaction();
            $orderService = Button::findOrFail($id);
            $orderService->delete();
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
        Session::flash('message', 'data Deleted success');
        Session::flash('alert-class', 'alert-danger');
        return redirect()->back()->with('success', 'Delete Successfully Slider');
    }
}