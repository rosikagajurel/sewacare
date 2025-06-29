<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        // Logic for the admin dashboard can be added here
        return view('admin.dashboard');
    }

    public function profile()
    {
        // Logic for the admin dashboard can be added here
        return view('admin.profile');
    }


}