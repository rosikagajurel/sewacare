<?php

namespace App\Http\Controllers\Caregiver;

use App\Http\Controllers\Controller;

class ShiftTimeController extends Controller
{
    public function index()
    {
        return view('caregiver.shiftTime');
    }
}
