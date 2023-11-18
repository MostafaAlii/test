<?php
namespace App\Http\Controllers\Backend;
use App\Models\Icon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\IconDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
class IconsController extends Controller {
    public function index(IconDatatable $icon) {
		return $icon->render('admin.icons.index', ['title' => 'icons']);
	}

    public function store(Request $request) {
        try {
            $icon = Icon::create($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'icon-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $icon->storeImage($request->file('image')->storeAs('icon', $fileName, 'upload_image'));
            }
            Session::flash('message', 'data create success');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
    }

    public function update(Request $request, Icon $icon) {
        try {
            $icon->update($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'icon-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $icon->updateImage($request->file('image')->storeAs('icon', $fileName, 'upload_image'));
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
            $icon = Icon::findOrFail($id);
            $icon->delete();
            $icon->deleteImage();
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
        Session::flash('message', 'data Deleted success');
        Session::flash('alert-class', 'alert-danger');
        return redirect()->back()->with('success', 'Delete Successfully Icon');
    }
}