<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Patient; // ✅ ADD THIS LINE
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index()
    {
        return view('patient.dashboard');
    }

    public function bookings()
    {
        return view('patient.bookings');
    }

    public function services()
    {
        return view('patient.services');
    }

    public function labReports()
    {
        return view('patient.labreports');
    }

    public function invoices()
    {
        return view('patient.invoice');
    }

    public function profile()
{
    $patient = Auth::user()->patient; // one-to-one relation
    return view('Patient.profile', compact('patient'));
}

public function updateProfile(Request $request)
{
    $user = Auth::user();
    $patient = $user->patient;

    // Validate request
    $validated = $request->validate([
        'full_name' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255|unique:users,email,' . $user->id,
        'contact_number' => 'nullable|string|max:20',
        'date_of_birth' => 'nullable|date',
        'gender' => 'nullable|in:male,female,other',
        'blood_group' => 'nullable|string|max:5',
        'address' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:100',
        'state' => 'nullable|string|max:100',
        'postal_code' => 'nullable|string|max:20',
        'emergency_contact_name' => 'nullable|string|max:255',
        'emergency_contact_number' => 'nullable|string|max:20',
        'insurance_provider' => 'nullable|string|max:255',
        'insurance_number' => 'nullable|string|max:50',
        'medical_history' => 'nullable|string',
        'prescriptions' => 'nullable|string',
        'health_condition' => 'nullable|string',
        'allergies' => 'nullable|string',
        'disabilities' => 'nullable|string',
        'notes' => 'nullable|string',
    ]);

    // Update user full name and email
    if ($request->full_name) {
        $user->name = $request->full_name;
    }
    if ($request->email) {
        $user->email = $request->email;
    }
    $user->save();

    // Update patient details
    $patient->update($validated);

    return redirect()->back()->with('success', 'Profile updated successfully!');
}



    public function storeBooking(Request $request)
    {
        $request->validate([
            'service' => 'required',
            'full_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        Appointment::create([
            'patient_id' => Auth::id(),
            'services_id' => $request->service,
            'full_name' => $request->full_name,
            'location' => $request->location,
            'date' => $request->date,
            'time' => $request->time,
            'status' => 'Pending',
        ]);

        return redirect()->route('patient.appointments')->with('success', 'Appointment booked successfully!');
    }

    public function appointments()
    {
        $appointments = Appointment::where('patient_id', Auth::id())->get();
        return view('patient.appointments', compact('appointments'));
    }
}
