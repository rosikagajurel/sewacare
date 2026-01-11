<?php

namespace App\Http\Controllers\Caregiver;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use App\Models\Bids;
use App\Models\Booking;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceRequestController extends Controller
{
    /**
     * Show all pending service requests
     */
    public function serviceRequest()
    {
        $requests = ServiceRequest::with('patient', 'service')
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('caregiver.serviceRequest', compact('requests'));
    }

    /**
     * Accept the base price of a service request
     */
    public function acceptBasePrice($id)
    {
        // Get the service request
        $serviceRequest = ServiceRequest::with('service')->findOrFail($id);

        if ($serviceRequest->status !== 'pending') {
            return back()->with('error', 'Request already accepted.');
        }

        // Get the patient ID from patients table
        $patient = Patient::where('user_id', $serviceRequest->patient_id)->first();

        if (!$patient) {
            return back()->with('error', 'Patient record not found.');
        }

        // Update service request status
        $serviceRequest->status = 'accepted';
        $serviceRequest->save();

        // Create booking
        Booking::create([
            'patients_id'   => $patient->id,  // correct FK
            'caregivers_id' => Auth::id(),
            'services_id'   => $serviceRequest->service_id,
            'status'        => 'accepted',
            'price'         => $serviceRequest->service->base_price ?? 0,
            'location'      => $serviceRequest->location ?? 'N/A',
            'date_time'     => now(),
            'start_date'    => now(),
            'end_date'      => now()->addDay(),
            'duration_type' => 'one-time',
            'payment_status'=> 'pending',
        ]);

        return back()->with('success', 'You accepted the base price. Booking created.');
    }

    /**
     * Place a bid on a service request
     */
    public function placeBid(Request $request)
    {
        $request->validate([
            'service_request_id' => 'required|exists:service_requests,id',
            'proposed_price'    => 'required|numeric|min:1',
        ]);

        Bids::create([
            'caregivers_id'       => Auth::id(),
            'service_request_id'  => $request->service_request_id,
            'proposed_price'      => $request->proposed_price,
            'status'              => 'pending',
        ]);

        return back()->with('success', 'Your bid was submitted successfully.');
    }
}
