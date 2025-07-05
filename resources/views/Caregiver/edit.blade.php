<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Caregiver Profile - SewaCare</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('CSS/style.css') }}" />

  <style>
    .sidebar {
      background-color: white;
      height: 100vh;
      border-right: 1px solid #dee2e6;
    }
    .sidebar .nav-link {
      color: #333;
      padding: 12px;
    }
    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
      background-color: #e9f7fc;
      color: #0dcaf0;
    }
    .card {
      border-left: 5px solid #0dcaf0;
    }
    .profile-photo-box {
      width: 130px;
      height: 130px;
      background: #e9f7fc;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      margin: 0 auto;
      cursor: pointer;
    }
    .profile-photo-box img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border: 3px solid white;
      border-radius: 50%;
    }
    .logo-img {
      max-height: 50px;
    }
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-2 col-md-3 sidebar p-3">
      <div class="text-left mb-4">
        <a href="{{ route('caregiver.dashboard') }}">
          <img src="{{ asset('frontend/images/logo.png') }}" alt="SewaCare Logo" class="img-fluid logo-img" />
        </a>
      </div>
      <nav class="nav flex-column">
        <a class="nav-link" href="{{ route('caregiver.dashboard') }}">Dashboard</a>
        <a class="nav-link" href="{{ route('caregiver.bookings') }}">My Bookings</a>
        {{-- <a class="nav-link" href="{{ route('caregiver.tasks') }}">Update Tasks</a> --}}
        <a class="nav-link active" href="{{ route('Caregiver.edit') }}">My Profile</a>
        {{-- <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a> --}}
      </nav>
    </div>

    <div class="col-md-9 col-lg-10 p-4">
      <div class="card shadow-sm p-4">
        <h3 class="text-info mb-4">Edit Caregiver Profile</h3>

        {{-- Success Message --}}
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('Caregiver.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row g-4">

            <div class="col-md-4 text-center">
              <input type="file" name="profile_photo" id="fileInput" accept="image/*" style="display: none;" />
              <label for="fileInput" class="profile-photo-box" title="Click to change photo">
                <img
                  id="profilePreview"
                  src="{{ $caregiver->profile_photo_path ? asset('storage/' . $caregiver->profile_photo_path) : asset('Images/default-profile.png') }}"
                  alt="Profile Photo"
                />
              </label>

              <h5 class="mt-3 mb-1 fw-semibold">{{ $user->name ?? 'Your Name' }}</h5>
              <p class="text-muted small">{{ $caregiver->caregiver_type ?? 'Caregiver' }}</p>
            </div>

            <div class="col-md-8">
              <div class="row">

                <div class="col-md-6 mb-3">
                  <label class="form-label">Full Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="name"
                    value="{{ old('name', $user->name ?? '') }}"
                    required
                  />
                </div>

                <div class="col-md-6 mb-3">
                  <label class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    name="email"
                    value="{{ old('email', $user->email ?? '') }}"
                    required
                  />
                </div>

                <div class="col-md-6 mb-3">
                  <label class="form-label">Phone</label>
                  <input
                    type="text"
                    class="form-control"
                    name="contact_number"
                    value="{{ old('contact_number', $caregiver->contact_number ?? '') }}"
                  />
                </div>

                <div class="col-md-6 mb-3">
                  <label class="form-label">Address</label>
                  <input
                    type="text"
                    class="form-control"
                    name="address"
                    value="{{ old('address', $caregiver->address ?? '') }}"
                  />
                </div>

                <div class="col-md-6 mb-3">
                  <label class="form-label">Caregiver Type</label>
                  <select class="form-select" name="caregiver_type">
                    <option value="">-- Select Type --</option>
                    <option value="medical" {{ old('caregiver_type', $caregiver->caregiver_type ?? '') == 'medical' ? 'selected' : '' }}>Medical</option>
                    <option value="regular" {{ old('caregiver_type', $caregiver->caregiver_type ?? '') == 'regular' ? 'selected' : '' }}>Regular</option>
                    <option value="home_nurse" {{ old('caregiver_type', $caregiver->caregiver_type ?? '') == 'home_nurse' ? 'selected' : '' }}>Home Nurse</option>
                  </select>
                </div>

                <div class="col-md-6 mb-3">
                  <label class="form-label">Qualification</label>
                  <input
                    type="text"
                    class="form-control"
                    name="qualification"
                    value="{{ old('qualification', $caregiver->qualification ?? '') }}"
                  />
                </div>

                <div class="col-md-6 mb-3">
                  <label class="form-label">Experience</label>
                  <input
                    type="text"
                    class="form-control"
                    name="experience"
                    value="{{ old('experience', $caregiver->experience ?? '') }}"
                  />
                </div>

                <div class="col-md-6 mb-3">
                  <label class="form-label">Skills</label>
                  <input
                    type="text"
                    class="form-control"
                    name="skills"
                    value="{{ old('skills', $caregiver->skills ?? '') }}"
                  />
                </div>

                <div class="col-md-6 mb-3">
                  <label class="form-label">Field</label>
                  <select class="form-select" name="field">
                    <option value="">-- Select Field --</option>
                    <option value="Elder care" {{ old('field', $caregiver->field ?? '') == 'Elder care' ? 'selected' : '' }}>Elder care</option>
                    <option value="Child care" {{ old('field', $caregiver->field ?? '') == 'Child care' ? 'selected' : '' }}>Child care</option>
                    <option value="Therapy" {{ old('field', $caregiver->field ?? '') == 'Therapy' ? 'selected' : '' }}>Therapy</option>
                    <option value="Lab activity" {{ old('field', $caregiver->field ?? '') == 'Lab activity' ? 'selected' : '' }}>Lab activity</option>
                    <option value="Others" {{ old('field', $caregiver->field ?? '') == 'Others' ? 'selected' : '' }}>Others</option>
                  </select>
                </div>

                <div class="col-12 mb-3">
                  <label class="form-label">Bio</label>
                  <textarea
                    class="form-control"
                    name="bio"
                    rows="3"
                  >{{ old('bio', $caregiver->bio ?? '') }}</textarea>
                </div>

                <div class="col-md-12 mb-3">
                  <label class="form-label">Upload Certificate (PDF/Doc/Image)</label>
                  <input
                    type="file"
                    class="form-control"
                    name="certificate"
                    accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                  />

                  @if($caregiver->certificate_path)
                    <div class="mt-3">
                      <strong>Current Certificate:</strong><br />

                      @php
                        $ext = pathinfo($caregiver->certificate_path, PATHINFO_EXTENSION);
                      @endphp

                      @if(in_array($ext, ['jpg', 'jpeg', 'png']))
                        {{-- Show image certificate --}}
                        <img
                          src="{{ asset('storage/' . $caregiver->certificate_path) }}"
                          alt="Certificate"
                          style="max-width: 300px; border: 1px solid #ddd; padding: 5px;"
                        />
                      @elseif(in_array($ext, ['pdf']))
                        {{-- Embed PDF certificate --}}
                        <iframe
                          src="{{ asset('storage/' . $caregiver->certificate_path) }}"
                          style="width: 100%; height: 400px; border: none;"
                        ></iframe>
                      @else
                        {{-- For docs or unsupported types, provide a download link --}}
                        <a
                          href="{{ asset('storage/' . $caregiver->certificate_path) }}"
                          target="_blank"
                          class="btn btn-sm btn-outline-primary mt-2"
                        >
                          Download Certificate ({{ strtoupper($ext) }})
                        </a>
                      @endif
                    </div>
                  @endif
                </div>

                <div class="col-12 mb-3 form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    name="availability_status"
                    id="availability"
                    value="1"
                    {{ old('availability_status', $caregiver->availability_status ?? false) ? 'checked' : '' }}
                  />
                  <label class="form-check-label" for="availability">Available for service</label>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-info px-4">Save Profile</button>
                </div>

              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
