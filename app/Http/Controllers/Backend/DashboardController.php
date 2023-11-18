<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        Session::flash('message', 'Welcome To Dashboard');
        Session::flash('alert-class', 'alert-success');
        return view('admin.index');
    }
}
