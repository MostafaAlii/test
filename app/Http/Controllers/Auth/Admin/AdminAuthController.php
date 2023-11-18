<?php
namespace App\Http\Controllers\Auth\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Backend\AdminLoginRequest;
class AdminAuthController extends Controller {
    public function index() {
        return view('admin.auth.login');
    }

    public function store(AdminLoginRequest $request) {
        $check = $request->all();
        $remember = $request->has('remember');
        if(admin_guard()->attempt(['email' => $check['email'], 'password' => $check['password']], $remember)) {
            if(admin_guard()->user()?->status == 0) {
                admin_guard()->logout();
                $notification = array(
                    'message' => 'Admin is not activated',
                    'alert-type' => 'warning'
                );
                return redirect()->route('admin.login')->with($notification);
            } else {
                return redirect()->route('admin.dashboard');
            }
        }else {
            return redirect()->back();
        }
    }


    public function destroy(Request $request) {
        admin_guard()->logout();
        $request->session()->forget('guard.admin');
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

}