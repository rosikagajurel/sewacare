@extends('admin.layouts.app') {{-- or whatever your layout file is --}}

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Available Service Requests</h2>

    @if($requests->isEmpty())
        <div class="alert alert-info">No pending service requests found.</div>
    @else
        <div class="row">
            @foreach($requests as $request)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm rounded">
                        <div class="card-body">
                            <h5 class="card-title">{{ $request->service->name }}</h5>
                            <p><strong>Service Type:</strong> {{ ucfirst($request->service->service_type) }}</p>
                            <p><strong>Patient Name:</strong> {{ $request->patient->name }}</p>
                            <p><strong>Location:</strong> {{ $request->location }}</p>
                            <p><strong>Preferred Time:</strong> {{ \Carbon\Carbon::parse($request->preferred_time)->format('d M Y, h:i A') }}</p>
                            <p><strong>Description:</strong> {{ $request->description }}</p>
                            <p><strong>Status:</strong>
                            <span class="badge bg-warning text-dark">{{ ucfirst($request->status) }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
