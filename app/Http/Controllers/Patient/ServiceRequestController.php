<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceRequestController extends Controller
{
    public function create()
    {
        return view('patient.service_requests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'caregiver_id' => 'required|exists:users,id',
            'service_description' => 'required|string|min:10',
        ]);

        Service::create([
            'patient_id' => Auth::id(),
            'caregiver_id' => $request->caregiver_id,
            'description' => $request->service_description,
            'status' => 'pending',
        ]);

        return redirect()->route('patient.dashboard')->with('success', 'Service request sent successfully.');
    }
}
