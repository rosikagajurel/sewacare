<?php
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

public function create()
{
    $caregivers = \App\Models\Caregiver::all(); // Adjust model name
    return view('patients.request_service', compact('caregivers'));
}

public function store(Request $request)
{
    $request->validate([
        'caregiver_id' => 'required|exists:caregivers,id',
        'service_type' => 'required',
        'description' => 'required',
        'requested_date' => 'required|date',
    ]);

    ServiceRequest::create([
        'patient_id' => Auth::id(),
        'caregiver_id' => $request->caregiver_id,
        'service_type' => $request->service_type,
        'description' => $request->description,
        'requested_date' => $request->requested_date,
    ]);

    return redirect()->back()->with('success', 'Service request sent successfully!');
}
