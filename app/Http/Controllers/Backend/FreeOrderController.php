<?php

namespace App\Http\Controllers\Backend;
use App\Models\{FreeOrder};
use App\DataTables\FreeOrderDatatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
class FreeOrderController extends Controller
{
    public function index(FreeOrderDatatable $order) {
        return $order->render('admin.free-orders.index', ['title' => 'Free-Orders']);
    }

    public function show($id) {
        $order = FreeOrder::findOrFail($id);
        return view('admin.free-orders.show', compact('order'));
    }

    public function destroy(string $id) {
        try {
            $services = FreeOrder::findOrFail($id);
            $services->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
        Session::flash('message', 'data Deleted success');
        Session::flash('alert-class', 'alert-danger');
        return redirect()->back()->with('success', 'Delete Successfully Slider');
    }
}