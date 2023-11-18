<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\{Home, Image};
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {
    public function index()
    {
        $home = Home::first();
        $title = 'Main-Home';
        return view('admin.mainHome.index', compact(['home', 'title']));
    }

    public function save(Request $request) {
        //dd($request->all());
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'home_compression_title'    => 'required|string',
            'home_compression_description'  => 'required|string',

            'service_title'  => 'required|string',
            'service_title_colored'  => 'required|string',
            'service_gallery_description'  => 'required|string',
            
            'note1' => 'nullable|string',
            'note2' => 'nullable|string',
            'note3' => 'nullable|string',
            'note4' => 'nullable|string',
        ]);
        
        $home = Home::firstOrNew([]);
        $home->deleteImage();
        
        if (!$home->exists) 
            $home->save();

        if ($request->hasFile('home_compressions')) {
            foreach ($request->file('home_compressions') as $image) {
                $fileName = 'home_compression-' . Str::random(3) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $home->storeImage($image->storeAs('home', $fileName, 'upload_image'), Image::HOME_COMPRESSION_SLIDER);
            }
        }
        
        if ($request->hasFile('home_banner')) {
            foreach ($request->file('home_banner') as $image) {
                $fileName = 'home_banner-' . Str::random(3) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $home->storeImage($image->storeAs('home', $fileName, 'upload_image'), Image::HOME_BANNER);
            }
        }
        
        $home->update($data);
        Session::flash('message', $home->wasRecentlyCreated ? 'Created Successfully' : 'Updated Successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.mainHome');
    }
}