<?php

namespace App\Http\Controllers\Backend;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller {
    public function index() {
        $about = About::first();
        $title = 'About-Us';
        return view('admin.aboutUs.index', compact(['about', 'title']));
    }

    public function save(Request $request) {
        //dd($request->all());
        $data = $request->validate([
            'name' => 'required|string',
            'note1' => 'required|string',
            'note2' => 'required|string',
        ]);
        $about = About::first();
        if ($about) {
            $about->update($data);
            if ($request->hasFile('image')) {
                $fileName = 'about-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $about->updateImage($request->file('image')->storeAs('about', $fileName, 'upload_image'));
            }
        } else {
            About::create($data);
            if ($request->hasFile('image')) {
                $fileName = 'about-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $about->storeImage($request->file('image')->storeAs('about', $fileName, 'upload_image'));
            }
        }
        Session::flash('message', 'Updated Successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.aboutUs')->with('success', 'About updated successfully');
    }
}