<?php

namespace App\Http\Controllers\Caregiver;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Auth;

class ServiceRequestController extends Controller
{
    public function serviceRequest()
    {
        // You can filter based on caregiver preferences later
        $requests = ServiceRequest::with(['patient', 'service'])
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('caregiver.serviceRequest', compact('requests'));
    }
}
