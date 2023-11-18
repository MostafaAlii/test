<?php
namespace App\Http\Controllers\Backend;
use App\Models\Admin;
use App\DataTables\AdminDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class AdminController extends Controller {
    public function index(AdminDatatable $admin) {
		return $admin->render('admin.admins.index', ['title' => 'admins']);
	}

	public function store(Request $request) {
		dd($request->all());
	}
}