{{-- resources/views/patient/bookings.blade.php --}}
@extends('Patient.Layouts.app') {{-- assuming your main layout is Patient/Layouts/app.blade.php --}}

@section('title', 'Book a Home Visit - SewaCare')

@section('content')
<div class="card shadow-sm card-accent mb-4 mt-4">
  <div class="card-body">
    <h3 class="text-info fw-semibold mb-2">Book a Home Visit</h3>
    <p class="text-muted mb-3">We bring quality healthcare right to your doorstep. Fill the form below to get started.</p>

    <form action="{{ route('patient.storeBooking') }}" method="POST" class="row g-3">
      @csrf
      <div class="col-12">
        <label for="serviceType" class="form-label">Select Service</label>
        <select name="service" class="form-select" id="serviceType" required>
          <option disabled selected value="">Choose service</option>
          <option>Home Nursing</option>
          <option>Physiotherapy</option>
          <option>Lab Tests</option>
          <option>Child Care Support</option>
          <option>Post-Surgery Care</option>
          <option>Doctor Home Visit</option>
          <option>Wound Dressing</option>
          <option>Vaccination</option>
        </select>
      </div>

      <div class="col-12">
        <label for="full_name" class="form-label">Full Name</label>
        <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Enter your name" required>
      </div>

      <div class="col-12">
        <label for="location" class="form-label">Location</label>
        <input type="text" name="location" id="location" class="form-control" placeholder="Enter your address" required>
      </div>

      <div class="col-md-6">
        <label for="date" class="form-label">Preferred Date</label>
        <input type="date" name="date" id="date" class="form-control" required>
      </div>

      <div class="col-md-6">
        <label for="time" class="form-label">Preferred Time</label>
        <input type="time" name="time" id="time" class="form-control" required>
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-info w-100 fw-semibold text-white">
          Confirm Booking
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
