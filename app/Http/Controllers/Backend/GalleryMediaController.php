<?php
namespace App\Http\Controllers\Backend;
use App\Models\GalleryImage;
use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\MainGalleryDataTable;
use Illuminate\Support\Facades\{DB, Session};
class GalleryMediaController extends Controller {
    public function index(MainGalleryDataTable $orderService) {
        return $orderService->render('admin.mainGallery.index', ['title' => 'Main-Gallery']);
    }

    public function store(Request $request) {
        try {
            $orderService = Gallery::create($request->input());
            Session::flash('message', 'data create success');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
    }

    public function update(Request $request, $id) {
        try {
            $orderService = Gallery::findOrFail($id);
            $orderService->update($request->input());
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
            $orderService = Gallery::findOrFail($id);
            $orderService->delete();
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
        Session::flash('message', 'data Deleted success');
        Session::flash('alert-class', 'alert-danger');
        return redirect()->back()->with('success', 'Delete Successfully Slider');
    }

    public function addImages($gallery_id){
        return view('admin.mainGallery.media')->with('id', $gallery_id);
    }

    //to save images to folder only
    public function saveProductImages(Request $request ){

        $file = $request->file('dzfile');
        $filename = uploadImage('gallery', $file);

        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);

    }

    public function saveProductImagesDB(Request $request){
        try {
            // save dropzone images
            if ($request->has('document') && count($request->document) > 0) {
                foreach ($request->document as $image) {
                   
                    GalleryImage::create([
                        'gallery_id' => $request->gallery_id,
                        'photo' => $image,
                    ]);
                }
            }

            return redirect()->route('admin.mainGallery')->with(['success' => 'تم التحديث بنجاح']);

         }catch(\Exception $ex){
             return redirect()->route('admin.mainGallery')->with([$ex]);
         }
    }
    
    public function destroyMedia($gallery_id, $image_id) {
        $image = GalleryImage::where('gallery_id', $gallery_id)->find($image_id);
        if (!$image) 
            return redirect()->route('admin.mainGallery.images', ['id' => $gallery_id])->with('error', 'the image not found');
        $image->delete();
        return redirect()->route('admin.mainGallery.images', ['id' => $gallery_id])->with('success', 'Image Delete Successfully');
    }


}