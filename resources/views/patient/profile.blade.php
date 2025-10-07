@extends('Patient.layouts.app')
@section('title', 'Patient Profile')

@section('content')
<div class="card shadow-sm p-4">
    <h3 class="text-info mb-4">Patient Profile</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('patient.updateProfile') }}" method="POST">
        @csrf
        <div class="row">

            <!-- Full Name (from users table) -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="full_name" class="form-control"
                       value="{{ old('full_name', Auth::user()->name ?? '') }}">
            </div>

            <!-- Email (readonly) -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" value="{{ Auth::user()->email ?? '' }}">
            </div>

            <!-- Contact Number -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Contact Number</label>
                <input type="text" name="contact_number" class="form-control"
                       value="{{ old('contact_number', $patient->contact_number ?? '') }}">
            </div>

            <!-- Date of Birth -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" name="date_of_birth" class="form-control"
                       value="{{ old('date_of_birth', $patient->date_of_birth ?? '') }}">
            </div>

            <!-- Gender -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-select">
                    <option value="">Select Gender</option>
                    <option value="male" {{ ($patient->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ ($patient->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ ($patient->gender ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <!-- Blood Group -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Blood Group</label>
                <input type="text" name="blood_group" class="form-control"
                       value="{{ old('blood_group', $patient->blood_group ?? '') }}">
            </div>

            <!-- Address -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control"
                       value="{{ old('address', $patient->address ?? '') }}">
            </div>

            <!-- City -->
            <div class="col-md-6 mb-3">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control"
                       value="{{ old('city', $patient->city ?? '') }}">
            </div>

            <!-- State -->
            <div class="col-md-6 mb-3">
                <label class="form-label">State</label>
                <input type="text" name="state" class="form-control"
                       value="{{ old('state', $patient->state ?? '') }}">
            </div>

            <!-- Postal Code -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Postal Code</label>
                <input type="text" name="postal_code" class="form-control"
                       value="{{ old('postal_code', $patient->postal_code ?? '') }}">
            </div>

            <!-- Emergency Contact Name -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Emergency Contact Name</label>
                <input type="text" name="emergency_contact_name" class="form-control"
                       value="{{ old('emergency_contact_name', $patient->emergency_contact_name ?? '') }}">
            </div>

            <!-- Emergency Contact Number -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Emergency Contact Number</label>
                <input type="text" name="emergency_contact_number" class="form-control"
                       value="{{ old('emergency_contact_number', $patient->emergency_contact_number ?? '') }}">
            </div>

            <!-- Insurance Provider -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Insurance Provider</label>
                <input type="text" name="insurance_provider" class="form-control"
                       value="{{ old('insurance_provider', $patient->insurance_provider ?? '') }}">
            </div>

            <!-- Insurance Number -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Insurance Number</label>
                <input type="text" name="insurance_number" class="form-control"
                       value="{{ old('insurance_number', $patient->insurance_number ?? '') }}">
            </div>

            <!-- Medical History -->
            <div class="col-12 mb-3">
                <label class="form-label">Medical History</label>
                <textarea name="medical_history" class="form-control" rows="3">{{ old('medical_history', $patient->medical_history ?? '') }}</textarea>
            </div>

            <!-- Prescriptions -->
            <div class="col-12 mb-3">
                <label class="form-label">Prescriptions</label>
                <textarea name="prescriptions" class="form-control" rows="3">{{ old('prescriptions', $patient->prescriptions ?? '') }}</textarea>
            </div>

            <!-- Health Condition -->
            <div class="col-12 mb-3">
                <label class="form-label">Health Condition</label>
                <textarea name="health_condition" class="form-control" rows="3">{{ old('health_condition', $patient->health_condition ?? '') }}</textarea>
            </div>

            <!-- Allergies -->
            <div class="col-12 mb-3">
                <label class="form-label">Allergies</label>
                <textarea name="allergies" class="form-control" rows="3">{{ old('allergies', $patient->allergies ?? '') }}</textarea>
            </div>

            <!-- Disabilities -->
            <div class="col-12 mb-3">
                <label class="form-label">Disabilities</label>
                <textarea name="disabilities" class="form-control" rows="3">{{ old('disabilities', $patient->disabilities ?? '') }}</textarea>
            </div>

            <!-- Notes -->
            <div class="col-12 mb-3">
                <label class="form-label">Notes</label>
                <textarea name="notes" class="form-control" rows="3">{{ old('notes', $patient->notes ?? '') }}</textarea>
            </div>

        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary px-4">Update Profile</button>
        </div>
    </form>
</div>
@endsection
