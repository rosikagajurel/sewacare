<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment; // Make sure you have an Appointment model

class AppointmentController extends Controller
{
    // Show all appointments
    public function index()
    {
        $appointments = Appointment::all();
        return view('admin.appointments.index', compact('appointments'));
    }

    // Show form to create new appointment
    public function create()
    {
        return view('admin.appointments.create');
    }

    // Store new appointment
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'date' => 'required|date',
            'time' => 'required'
        ]);

        Appointment::create($request->all());

        return redirect()->route('admin.appointment')->with('success', 'Appointment created successfully!');
    }

    // Show specific appointment
    public function show(Appointment $appointment)
    {
        return view('admin.appointments.show', compact('appointment'));
    }

    // Show form to edit appointment
    public function edit(Appointment $appointment)
    {
        return view('admin.appointments.edit', compact('appointment'));
    }

    // Update appointment
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'date' => 'required|date',
            'time' => 'required'
        ]);

        $appointment->update($request->all());

        return redirect()->route('admin.appointment')->with('success', 'Appointment updated successfully!');
    }

    // Delete appointment
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('admin.appointment')->with('success', 'Appointment deleted successfully!');
    }
}
