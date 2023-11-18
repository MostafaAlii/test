<?php

namespace App\Http\Controllers\Backend;
use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FeatureController extends Controller {
    public function index() {
        $feature = Feature::first();
        $title = 'Feature-Section';
        return view('admin.features.index', compact(['feature', 'title']));
    }

    public function save(Request $request) {
        //dd($request->all());
        $data = $request->validate([
            'name' => 'required|string',
            'note1' => 'required|string',
            'note2' => 'required|string',
            'note3' => 'required|string',
        ]);
        $feature = Feature::first();
        if ($feature) 
            $feature->update($data);
        Feature::create($data);
        Session::flash('message', 'Updated Successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.feature')->with('success', 'Feature updated successfully');
    }
}