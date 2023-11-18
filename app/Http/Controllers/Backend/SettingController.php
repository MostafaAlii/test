<?php

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller {
    public function index() {
        $setting = Setting::first();
        $title = 'Main-Settings';
        return view('admin.mainSettings.index', compact(['setting', 'title']));
    }

    public function save(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'whatsapp' => 'required|string',
            'email' => 'required|email',
            'facebook' => 'required|string',
            'twitter' => 'required|string',
            'instagram' => 'required|string',
            'notes' => 'nullable|string',
            'notes1' => 'nullable|string',
            'notes2' => 'nullable|string',
            'notes3' => 'nullable|string',
            'notes4' => 'nullable|string',
            'notes5' => 'nullable|string',
            'notes6' => 'nullable|string',
            'notes7' => 'nullable|string',
        ]);
        $setting = Setting::first();
        if ($setting) {
            $setting->update($data);
            if ($request->hasFile('image')) {
                $fileName = 'setting-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $setting->updateImage($request->file('image')->storeAs('setting', $fileName, 'upload_image'));
            }
        } else {
            Setting::create($data);
            if ($request->hasFile('image')) {
                $fileName = 'setting-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $setting->storeImage($request->file('image')->storeAs('setting', $fileName, 'upload_image'));
            }
        }
        Session::flash('message', 'Updated Successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.mainSettings')->with('success', 'Settings updated successfully');
    }
}
