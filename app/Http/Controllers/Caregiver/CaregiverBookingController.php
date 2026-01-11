<?php

namespace App\Http\Controllers\Caregiver;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Bids;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Auth;

class CaregiverBookingController extends Controller
{
    public function bookings()
    {
        $caregiverId = Auth::id();

        // Pending bids for this caregiver (only valid serviceRequests)
        $pendingBids = Bids::with('serviceRequest.patient', 'serviceRequest.service')
            ->where('caregivers_id', $caregiverId)
            ->where('status', 'pending')
            ->get()
            ->filter(fn($bid) => $bid->serviceRequest !== null);

        // Pending service requests not yet accepted by this caregiver
        $pendingRequests = ServiceRequest::with('patient', 'service')
            ->where('status', 'pending')
            ->get();

        // Merge bids and requests
        $pendingBookings = $pendingBids->merge($pendingRequests);

        // Accepted / In Progress bookings
        $acceptedBookings = Booking::with('patient', 'service', 'serviceRequest')
            ->where('caregivers_id', $caregiverId)
            ->where('status', 'accepted')
            ->get();

        // Completed bookings
        $completedBookings = Booking::with('patient', 'service', 'serviceRequest')
            ->where('caregivers_id', $caregiverId)
            ->where('status', 'completed')
            ->get();

        return view('caregiver.CaregiverBooking', compact(
            'pendingBookings',
            'acceptedBookings',
            'completedBookings'
        ));
    }

    // Accept a bid and create booking
    public function acceptBid(Bids $bid)
    {
        if (!$bid->serviceRequest) {
            return back()->with('error', 'This bid has no valid service request.');
        }

        $bid->update(['status' => 'accepted']);

        Booking::create([
            'patients_id' => $bid->serviceRequest->patient_id,
            'caregivers_id' => $bid->caregivers_id,
            'services_id' => $bid->serviceRequest->service_id,
            'status' => 'accepted',
            'price' => $bid->proposed_price,
            'location' => $bid->serviceRequest->location ?? 'N/A',
            'date_time' => now(),
            'start_date' => now(),
            'end_date' => now()->addDay(),
        ]);

        return back()->with('success', 'Bid accepted and added to your bookings.');
    }

    // Mark booking as completed
    public function complete(Booking $booking)
    {
        $booking->update(['status' => 'completed']);
        return back()->with('success', 'Booking marked as completed.');
    }
}
