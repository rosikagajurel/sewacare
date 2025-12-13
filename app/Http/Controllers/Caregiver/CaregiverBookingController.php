<?php

namespace App\Http\Controllers\Caregiver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookings;
use Illuminate\Support\Facades\Auth;

class CaregiverBookingController extends Controller
{
    // Show all bookings for caregiver
    public function index()
    {
        $user = Auth::user();

        if (!$user || !$user->caregiver) {
            abort(403, 'Unauthorized. You must be logged in as a caregiver.');
        }

        $caregiverId = $user->caregiver->id;

        $upcomingBookings = Bookings::where('caregivers_id', $caregiverId)
            ->whereIn('status', ['pending', 'accepted'])
            ->orderBy('date_time')
            ->get();

        $completedBookings = Bookings::where('caregivers_id', $caregiverId)
            ->where('status', 'completed')
            ->orderByDesc('date_time')
            ->get();

        return view('caregiver.caregiverBooking', compact('upcomingBookings', 'completedBookings'));
    }

    // Mark booking as completed
    public function markCompleted(Request $request, $bookingId)
    {
        $user = Auth::user();

        if (!$user || !$user->caregiver) {
            abort(403, 'Unauthorized access.');
        }

        $caregiverId = $user->caregiver->id;

        $booking = Bookings::where('caregivers_id', $caregiverId)
            ->where('booking_id', $bookingId)
            ->firstOrFail();

        $booking->status = 'completed';
        $booking->save();

        return redirect()->back()->with('success', 'Booking marked as completed.');
    }
}
