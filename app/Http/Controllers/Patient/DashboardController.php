<?php
namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    public function index()
    {
        // Make sure the view path matches the folder structure
        return view('patient.dashboard'); // lowercase folder 'patient'
    }
}

