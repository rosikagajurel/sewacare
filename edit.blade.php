<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Caregiver Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h2>Edit Caregiver Profile</h2>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('Caregiver.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Name --}}
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" id="name" class="form-control"
                       value="{{ old('name', $user->name ?? '') }}" required>
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control"
                       value="{{ old('email', $user->email ?? '') }}" required>
            </div>

            {{-- Contact Number --}}
            <div class="mb-3">
                <label for="contact_number" class="form-label">Phone</label>
                <input type="text" name="contact_number" id="contact_number" class="form-control"
                       value="{{ old('contact_number', $caregiver->contact_number ?? '') }}">
            </div>

            {{-- Address --}}
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control"
                       value="{{ old('address', $caregiver->address ?? '') }}">
            </div>

            {{-- Caregiver Type --}}
            <div class="mb-3">
                <label for="caregiver_type" class="form-label">Caregiver Type</label>
                <select name="caregiver_type" class="form-control">
                    <option value="">-- Select Type --</option>
                    <option value="medical" {{ old('caregiver_type', $caregiver->caregiver_type ?? '') == 'medical' ? 'selected' : '' }}>Medical</option>
                    <option value="regular" {{ old('caregiver_type', $caregiver->caregiver_type ?? '') == 'regular' ? 'selected' : '' }}>Regular</option>
                </select>
            </div>

            {{-- Qualification --}}
            <div class="mb-3">
                <label for="qualification" class="form-label">Qualification</label>
                <input type="text" name="qualification" id="qualification" class="form-control"
                       value="{{ old('qualification', $caregiver->qualification ?? '') }}">
            </div>

            {{-- Experience --}}
            <div class="mb-3">
                <label for="experience" class="form-label">Experience</label>
                <input type="text" name="experience" id="experience" class="form-control"
                       value="{{ old('experience', $caregiver->experience ?? '') }}">
            </div>

            {{-- Skills --}}
            <div class="mb-3">
                <label for="skills" class="form-label">Skills</label>
                <input type="text" name="skills" id="skills" class="form-control"
                       value="{{ old('skills', $caregiver->skills ?? '') }}">
            </div>

            {{-- Professional Field --}}
            <div class="mb-3">
                <label for="field" class="form-label">Professional Field</label>
                <select name="field" class="form-control">
                    <option value="">-- Select Field --</option>
                    <option value="Elder care" {{ old('field', $caregiver->field ?? '') == 'Elder care' ? 'selected' : '' }}>Elder care</option>
                    <option value="Child care" {{ old('field', $caregiver->field ?? '') == 'Child care' ? 'selected' : '' }}>Child care</option>
                    <option value="Therapy" {{ old('field', $caregiver->field ?? '') == 'Therapy' ? 'selected' : '' }}>Therapy</option>
                    <option value="Lab activity" {{ old('field', $caregiver->field ?? '') == 'Lab activity' ? 'selected' : '' }}>Lab activity</option>
                    <option value="Others" {{ old('field', $caregiver->field ?? '') == 'Others' ? 'selected' : '' }}>Others</option>
                </select>
            </div>

            {{-- Bio --}}
            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <textarea name="bio" id="bio" class="form-control">{{ old('bio', $caregiver->bio ?? '') }}</textarea>
            </div>

            {{-- Availability --}}
            <div class="mb-3">
                <label class="form-label">Available</label><br>
                <input type="checkbox" name="availability_status" value="1"
                       {{ old('availability_status', $caregiver->availability_status ?? false) ? 'checked' : '' }}>
            </div>

            {{-- Upload Certificate --}}
            <div class="mb-3">
                <label for="certificate" class="form-label">Upload Certificate</label>
                <input type="file" name="certificate" id="certificate" class="form-control">
                @if($caregiver->certificate_path)
                    <div class="mt-2">
                        <a href="{{ asset('storage/' . $caregiver->certificate_path) }}" target="_blank">View Current Certificate</a>
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
</body>
</html>
