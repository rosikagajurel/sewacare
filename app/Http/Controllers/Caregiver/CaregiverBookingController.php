<?php

namespace App\Http\Controllers\Caregiver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookings;


use App\Models\User;

class CaregiverBookingController extends Controller
{
    public function index()
{
    $user = auth()->user();

    if (!$user || !$user->caregiver) {
        abort(403, 'Unauthorized. You must be logged in as a caregiver.');
    }

    $caregiverId = $user->caregiver->id;

    $upcomingBookings = Bookings::where('caregivers_id', $caregiverId)
        ->whereIn('status', ['pending', 'accepted']) // include pending bookings
        ->orderBy('date_time')
        ->get();

    $completedBookings = Bookings::where('caregivers_id', $caregiverId)
        ->where('status', 'completed')
        ->orderByDesc('date_time')
        ->get();

    return view('caregiver.caregiverBooking', compact('upcomingBookings', 'completedBookings'));
}

    public function markCompleted(Request $request, $bookingId)
    {
        $user = auth()->user();

        if (!$user || !$user->caregiver) {
            abort(403, 'Unauthorized.');
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
