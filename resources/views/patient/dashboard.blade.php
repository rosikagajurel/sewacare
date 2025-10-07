@extends('Patient.layouts.app')
@section('title', 'Dashboard - SewaCare')

@section('content')
<div class="welcome-card mb-4">
  <h3 class="mb-1 text-info fw-semibold">Welcome back, {{ Auth::user()->name }}</h3>
  <p class="text-muted mb-0">Here is your health service summary.</p>
</div>

<div class="row g-4 mb-5">
  <div class="col-md-4">
    <div class="card summary-card shadow-sm p-3">
      <h6>Total Bookings</h6>
      <h4>5</h4>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card summary-card shadow-sm p-3">
      <h6>Upcoming Services</h6>
      <h4>2</h4>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card summary-card shadow-sm p-3">
      <h6>Lab Reports</h6>
      <h4>1</h4>
    </div>
  </div>
</div>

<h5 class="mb-3">Recent Appointments</h5>
<table class="table table-hover">
  <thead class="table-light">
    <tr>
      <th>#</th>
      <th>Service</th>
      <th>Date</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Home Nursing</td>
      <td>2025-06-25</td>
      <td><span class="badge bg-success">Completed</span></td>
    </tr>
    <tr>
      <td>2</td>
      <td>Lab Test</td>
      <td>2025-06-26</td>
      <td><span class="badge bg-warning text-dark">Pending</span></td>
    </tr>
  </tbody>
</table>
@endsection
