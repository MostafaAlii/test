<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(UserDatatable $user) {
        return $user->render('admin.users.index', ['title' => 'users']);
    }

    public function store(Request $request) {
        try {
            $user = User::create($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'user-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $user->storeImage($request->file('image')->storeAs('user', $fileName, 'upload_image'));
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
            $user = User::findorfail($id);

            $user->update($request->input());
            if ($request->hasFile('image')) {
                $fileName = 'user-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $user->updateImage($request->file('image')->storeAs('user', $fileName, 'upload_image'));
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

           User::destroy($id);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
        Session::flash('message', 'data Deleted success');
        Session::flash('alert-class', 'alert-danger');
        return redirect()->back()->with('success', 'Delete Successfully Slider');
    }
}
