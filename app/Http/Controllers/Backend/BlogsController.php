<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\{Blog, Image};
use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{DB, Session};

class BlogsController extends Controller
{
    public function index(BlogDatatable $blog) {
        return $blog->render('admin.blogs.index', ['title' => 'blogs']);
    }

    public function store(Request $request) {
        try {
            $blog = Blog::create($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'blog-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $blog->storeImage($request->file('image')->storeAs('blog', $fileName, 'upload_image'), Image::MAIN_TYPE);
            }
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $fileName = 'blog-gallery_' . Str::random(3) . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $blog->storeImage($image->storeAs('blog', $fileName, 'upload_image'), Image::GALLERY_TYPE);
                }
            }
            Session::flash('message', 'data create success');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
    }


    public function update(Request $request, $id) {

        try {
            $blog = Blog::findorfail($id);
            $blog->update($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'blog-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $blog->updateImage($request->file('image')->storeAs('blog', $fileName, 'upload_image'));
            }
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $fileName = 'blog-gallery_' . Str::random(3) . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $blog->storeImage($image->storeAs('blog', $fileName, 'upload_image'), Image::GALLERY_TYPE);
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
            $blog = Blog::findOrFail($id);
            $blog->delete();
            $blog->deleteImage();
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