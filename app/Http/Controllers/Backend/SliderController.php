<?php

namespace App\Http\Controllers\Backend;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\SliderDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller {
    public function index(SliderDatatable $slider) {
		return $slider->render('admin.sliders.index', ['title' => 'sliders']);
	}

    public function store(Request $request) {
        try {
            $slider = Slider::create($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'slider-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $slider->storeImage($request->file('image')->storeAs('slider', $fileName, 'upload_image'));
            }
            Session::flash('message', 'data create success');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
    }


    public function update(Request $request, Slider $slider) {
        try {
            $slider->update($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'slider-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $slider->updateImage($request->file('image')->storeAs('slider', $fileName, 'upload_image'));
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
            $slider = Slider::findOrFail($id);
            $slider->delete();
            $slider->deleteImage();
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
