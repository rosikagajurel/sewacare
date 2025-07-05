<?php
namespace App\Http\Controllers\Caregiver;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use App\Models\Bids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceRequestController extends Controller
{
    public function serviceRequest()
    {
        $requests = ServiceRequest::with(['patient', 'service'])
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('caregiver.serviceRequest', compact('requests'));
    }

    public function acceptBasePrice($id)
    {
        $request = ServiceRequest::findOrFail($id);

        if ($request->status !== 'pending') {
            return back()->with('error', 'Request already accepted.');
        }

        $request->status = 'accepted';
        $request->save();

        return back()->with('success', 'You accepted the base price. Patient will be notified.');
    }

    public function placeBid(Request $request)
    {
        $request->validate([
            'service_request_id' => 'required|exists:service_requests,id',
            'proposed_price' => 'required|numeric|min:1',
        ]);

        Bids::create([
            'caregivers_id' => Auth::id(),
            'service_request_id' => $request->service_request_id,
            'proposed_price' => $request->proposed_price,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Your bid was submitted successfully.');
    }
}
