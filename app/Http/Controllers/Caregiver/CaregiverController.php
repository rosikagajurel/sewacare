<?php

namespace App\Http\Controllers\Caregiver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CaregiverController extends Controller
{
    //

    public function index()
    {
        // Logic for the admin dashboard can be added here
        return view('caregiver.dashboard');
    }
}
