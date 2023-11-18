<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ClientController extends Controller
{
    public function index()
    {
        $data = Order::where('user_id',get_user_data()->id)->with('orderDetails')->get();
        return view('website.dashboard.index', compact('data'));
    }

    public function retouchingStyle()
    {
        return view('website.dashboard.retouchingStyle');
    }

    public function editProfile()
    {
        $data = User::where('type', 'user')->where('id', auth()->id())->first();
        if ($data) {
            return view('website.auth.edit', compact('data'));
        }
        abort(404);
    }

    public function ProfileEdit(Request $request)
    {

        $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users,email,'. $request->id],
            'password' => ['sometimes', 'confirmed'],
        ]);

        $data = User::findorfail($request->id);
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => isset($request->password) ? Hash::make($request->password) : $data->password,
           'website' => $request->website ?? null,
        ]);
        return redirect()->back()->with(['success' => 'Edit Profile Success']);
    }

   /* public function getProcessOrder() {
        $processOrders = Order::where(get_user_data()->id, 'user_id')->whereType('progress')->get();
        return view('website.dashboard.index', compact('orders'));
    }

    public function getCompleteOrder() {
        $completeOrders = Order::where(get_user_data()->id, 'user_id')->whereType('completed')->get();
        return view('website.dashboard.index', compact('orders'));
    }*/
}