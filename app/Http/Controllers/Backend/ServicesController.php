<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Str;
use App\DataTables\ServicesDataTable;
use App\Http\Controllers\Controller;
use App\Models\{Service,Image};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class ServicesController extends Controller
{
    public function index(ServicesDatatable $services) {
        return $services->render('admin.services.index', ['title' => 'services']);
    }

    public function store(Request $request) {
        try {
            $services = Service::create($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'service-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $services->storeImage($request->file('image')->storeAs('service', $fileName, 'upload_image'));
            }
            Session::flash('message', 'data create success');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
    }


    public function update(Request $request,$id) {
        try {
            $services = Service::findorfail($id);
            $services->update($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'service-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $services->updateImage($request->file('image')->storeAs('service', $fileName, 'upload_image'));
            }
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $fileName = 'service-gallery_' . Str::random(3) . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $services->storeImage($image->storeAs('service', $fileName, 'upload_image'), Image::GALLERY_TYPE);
                }
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
            $services = Service::findOrFail($id);
            $services->delete();
            $services->deleteImage();
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