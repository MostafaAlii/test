<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\OrderServiceTimeDataTable;
use Illuminate\Support\Facades\{DB, Session};
use App\Models\OrderServiceTime;
class OrderServiceTimeStatusController extends Controller {
    public function index(OrderServiceTimeDataTable $orderServiceTime) {
        return $orderServiceTime->render('admin.orderTurnaroundTime.index', ['title' => 'Order Turnaround Time']);
    }
    
    public function store(Request $request) {
        try {
            $orderService = OrderServiceTime::create($request->input());
            Session::flash('message', 'data create success');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
    }

    public function update(Request $request, $id) {
        try {
            $orderService = OrderServiceTime::findorfail($id);
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
            $orderService = OrderServiceTime::findOrFail($id);
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