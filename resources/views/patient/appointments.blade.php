@extends('Patient.Layouts.app')

@section('title', 'My Appointments - SewaCare')

@section('content')
<h3 class="text-info fw-semibold mb-2">My Appointments</h3>
<p class="text-muted mb-3">Here are your upcoming appointments.</p>

<div class="table-responsive">
  <table class="table table-bordered table-hover">
    <thead class="table-light">
      <tr>
        <th>#</th>
        <th>Service</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($appointments as $key => $appointment)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $appointment->service }}</td>
          <td>{{ $appointment->date }}</td>
          <td>{{ $appointment->time }}</td>
          <td>
            @if($appointment->status == 'Pending')
              <span class="badge bg-warning text-dark">{{ $appointment->status }}</span>
            @else
              <span class="badge bg-success">{{ $appointment->status }}</span>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
