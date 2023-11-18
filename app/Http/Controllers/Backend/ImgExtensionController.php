<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ImgExtentionDataTable;
use App\Models\ImgExtension;
use Illuminate\Support\Facades\{DB, Session};
class ImgExtensionController extends Controller {
    public function index(ImgExtentionDataTable $imgExtension) {
        return $imgExtension->render('admin.imgExtension.index', ['title' => 'Image Extension']);
    }

    public function store(Request $request) {
        try {
            $orderService = ImgExtension::create($request->input());
            Session::flash('message', 'data create success');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
    }

    public function update(Request $request, $id) {
        try {
            $orderService = ImgExtension::findorfail($id);
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
            $orderService = ImgExtension::findOrFail($id);
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