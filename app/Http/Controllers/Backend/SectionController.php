<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SectionDataTable;
use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{
    public function index(SectionDatatable $section)
    {
        return $section->render('admin.sections.index', ['title' => 'sections']);
    }

    public function store(Request $request)
    {
        try {
            $slider = Section::create($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'section-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $slider->storeImage($request->file('image')->storeAs('section', $fileName, 'upload_image'));
            }
            Session::flash('message', 'data create success');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
    }


    public function update(Request $request, $id)
    {

        try {
            $section = Section::findorfail($id);
            $section->update($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'section-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $section->updateImage($request->file('image')->storeAs('section', $fileName, 'upload_image'));
            }
            Session::flash('message', 'data updated success');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
    }

    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $slider = Section::findOrFail($id);
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