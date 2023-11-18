<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\DB;
use App\DataTables\PartnerDatatable;
use Illuminate\Support\Facades\Session;
class PartnerController extends Controller {
    public function index(PartnerDatatable $partner) {
		return $partner->render('admin.partners.index', ['title' => 'partners']);
	}

    public function store(Request $request) {
        try {
            $partner = Partner::create($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'partner-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $partner->storeImage($request->file('image')->storeAs('partner', $fileName, 'upload_image'));
            }
            Session::flash('message', 'data create success');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
    }

    public function update(Request $request, Partner $partner) {
        try {
            $partner->update($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'partner-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $partner->updateImage($request->file('image')->storeAs('partner', $fileName, 'upload_image'));
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
            $partner = Partner::findOrFail($id);
            $partner->delete();
            $partner->deleteImage();
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
