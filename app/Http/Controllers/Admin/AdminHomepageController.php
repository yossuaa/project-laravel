<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomepageController extends Controller
{
    public function index(Request $request)
    {
        // CEK SUDAH LOGIN ATAU BELUM
        if (!$request->session()->has('login')) {
            return redirect('/admin/login');
        }

        return view('admin.dashboard');
    }
}
