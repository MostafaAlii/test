<?php

namespace App\Http\Controllers\Backend;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\SlideDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SlideController extends Controller {
    public function index(SlideDataTable $slide) {
		return $slide->render('admin.slides.index', ['title' => 'slides']);
	}

    public function store(Request $request) {
        try {
            $slide = Slide::create($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'slide-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $slide->storeImage($request->file('image')->storeAs('slide', $fileName, 'upload_image'));
            }
            Session::flash('message', 'data create success');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
    }


    public function update(Request $request, Slide $slide) {
        try {
            $slide->update($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'slide-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $slide->updateImage($request->file('image')->storeAs('slide', $fileName, 'upload_image'));
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
            $slide = Slide::findOrFail($id);
            $slide->delete();
            $slide->deleteImage();
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
        Session::flash('message', 'data Deleted success');
        Session::flash('alert-class', 'alert-danger');
        return redirect()->back()->with('success', 'Delete Successfully Slide');
    }
}