@extends('patient.layouts.app') <!-- main layout -->

@section('title', 'Patient Dashboard - SewaCare')

@section('content')
<div class="welcome-card mb-4">
  <h3 class="mb-1 text-info fw-semibold">Welcome back, {{ Auth::user()->name ?? 'Patient' }}</h3>
  <p class="text-muted mb-0">Here is your health service summary.</p>
</div>

<!-- rest of dashboard content -->
@endsection
