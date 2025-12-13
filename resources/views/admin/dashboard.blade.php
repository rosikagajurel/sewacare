@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-9 col-lg-10 p-4">
      <h2 class="mb-4">Welcome, {{ Auth::user()->name }}!</h2>

      <div class="row g-4 mb-5">
        <div class="col-md-4">
          <div class="card card-box shadow-sm p-3 border-start border-info border-5">
            <h6>Upcoming Visits</h6>
            <h4>4</h4>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-box shadow-sm p-3 border-start border-info border-5">
            <h6>Tasks to Log</h6>
            <h4>2</h4>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-box shadow-sm p-3 border-start border-info border-5">
            <h6>My Rating</h6>
            <h4>4.8 ★</h4>
          </div>
        </div>
      </div>

      <h5 class="mb-3">Today's Assigned Bookings</h5>
      <table class="table table-hover">
        <thead class="table-light">
          <tr>
            <th>SN</th>
            <th>Patient</th>
            <th>Service</th>
            <th>Time</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Ramesh K.</td>
            <td>Home Nursing</td>
            <td>10:00 AM</td>
            <td><span class="badge bg-warning text-dark">Pending</span></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Sunita M.</td>
            <td>Physiotherapy</td>
            <td>1:00 PM</td>
            <td><span class="badge bg-success">Confirmed</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
