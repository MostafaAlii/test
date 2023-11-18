<?php
namespace App\Http\Controllers\Backend;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\RetouchService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DataTables\RetouchServiceDataTable;

class RetouchServiceController extends Controller {
    public function index(RetouchServiceDataTable $retouch) {
		return $retouch->render('admin.retouchServices.index', ['title' => 'Retouch Services']);
	}

    public function store(Request $request) {
        try {
            $retouch = RetouchService::create($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'retouchservice-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $retouch->storeImage($request->file('image')->storeAs('retouchservice', $fileName, 'upload_image'));
            }
            Session::flash('message', 'data create success');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
    }

    public function update(Request $request, RetouchService $retouch) {
        try {
            $retouch->update($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'retouchservice-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $retouch->updateImage($request->file('image')->storeAs('retouchservice', $fileName, 'upload_image'));
            }
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
            $retouch = RetouchService::findOrFail($id);
            $retouch->delete();
            $retouch->deleteImage();
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
        Session::flash('message', 'data Deleted success');
        Session::flash('alert-class', 'alert-danger');
        return redirect()->back()->with('success', 'Delete Successfully retouch');
    }
}
