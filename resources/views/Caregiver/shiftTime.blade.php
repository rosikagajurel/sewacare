@extends('caregiver.layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 main-content">
      <div class="card shadow-sm mb-4 mt-4">
        <div class="card-body p-4">
          <h3 class="text-center text-dark fw-bold mb-4">My Available Shift and Time</h3>

          <form>
            <div class="mb-3">
              <label class="form-label d-block">Preferred Shift</label>
              <div class="btn-group w-100" role="group">
                <input type="radio" class="btn-check" name="shift" id="shiftDay" value="Day" required>
                <label class="btn btn-outline-info" for="shiftDay">Day Shift</label>

                <input type="radio" class="btn-check" name="shift" id="shiftNight" value="Night" required>
                <label class="btn btn-outline-info" for="shiftNight">Night Shift</label>

                <input type="radio" class="btn-check" name="shift" id="shiftRegular" value="Regular" required>
                <label class="btn btn-outline-info" for="shiftRegular">Both Shift</label>
              </div>
            </div>

            <div class="mb-3">
              <label for="timeSlot" class="form-label">Available Time</label>
              <input type="time" id="timeSlot" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="days" class="form-label">Available Days</label>
              <select id="days" class="form-select" required>
                <option value="" disabled selected>Select Days</option>
                <option>Monday</option>
                <option>Tuesday</option>
                <option>Wednesday</option>
                <option>Thursday</option>
                <option>Friday</option>
                <option>Saturday</option>
                <option>Sunday</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="services" class="form-label">Select Available Services</label>
              <select id="services" class="form-select" required>
                <option value="" disabled selected>Select a service</option>
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

            <div class="mb-4">
              <label for="date" class="form-label">Available Date</label>
              <input type="date" id="date" class="form-control" required>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-info fw-semibold text-white">Submit Availability</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
