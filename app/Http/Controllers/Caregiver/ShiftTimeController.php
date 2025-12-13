<?php

namespace App\Http\Controllers\Caregiver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShiftTimeController extends Controller
{
    public function index()
    {
        return view('caregiver.shiftTime');
    }

    public function store(Request $request)
    {
        $request->validate([
            'shift' => 'required|in:Day,Night,Regular',
            'timeSlot' => 'required|date_format:H:i',
            'days' => 'required|string',
            'services' => 'required|string',
            'date' => 'required|date|after_or_equal:today',
        ]);

        $caregiver = Auth::user()->caregiver;

        if (!$caregiver) {
            return back()->with('error', 'Caregiver profile not found.');
        }

        $caregiver->update([
            'preferred_shift' => $request->shift,
            'available_time' => $request->timeSlot,
            'available_day' => $request->days,
            'available_service' => $request->services,
            'available_date' => $request->date,
            'availability_status' => true,
        ]);

        return back()->with('success', 'Availability updated successfully!');
    }
}
