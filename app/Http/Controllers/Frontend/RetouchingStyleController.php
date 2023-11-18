<?php
namespace App\Http\Controllers\Frontend;
use App\Models\Retouch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RetouchingStyleController extends Controller {
    public function index() {
        $saveRetouchStyle = Retouch::where('user_id', get_user_data()->id)->first();
        return view('website.dashboard.retouchingStyle', compact('saveRetouchStyle'));
    }

    public function save(Request $request) {
        $selectedRetouchStyleType = $request->input('retouch_service_id');
        
        $retouchStyle = Retouch::updateOrCreate(
            ['user_id' => get_user_data()->id],
            [
                'retouch_service_id' => $request->input('retouch_service_id'),
                'retouching_note' => $request->input('retouching_note')
            ]
        );
        $saveRetouchStyle = Retouch::where('user_id', get_user_data()->id)->first();
        return redirect()->route('website.orders.index');
        //return view('website.dashboard.retouchingStyle', compact('saveRetouchStyle'));
    }
}