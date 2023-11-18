<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\PackagesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PackagesController extends Controller
{
    public function index(PackagesDatatable $packages) {
        return $packages->render('admin.packages.index', ['title' => 'packages']);
    }

    public function store(Request $request) {
        try {
            $packages = Package::create($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'package-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $packages->storeImage($request->file('image')->storeAs('package', $fileName, 'upload_image'));
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
            $packages = Package::findorfail($id);
            $packages->update($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'package-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $packages->updateImage($request->file('image')->storeAs('package', $fileName, 'upload_image'));
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
            $packages = Package::findOrFail($id);
            $packages->delete();
            $packages->deleteImage();
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
