@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Welcome, {{ $user->name }}</h2>
    <a href="{{ route('patient.service.create') }}" class="btn btn-info mt-3">Request a Service</a>
</div>
@endsection

// 10. resources/views/patient/service_requests/create.blade.php
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Request a Service</h2>
    <form action="{{ route('patient.service.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="caregiver_id">Caregiver ID</label>
            <input type="number" name="caregiver_id" id="caregiver_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="service_description">Service Description</label>
            <textarea name="service_description" id="service_description" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-info">Submit</button>
    </form>
</div>
@endsection
