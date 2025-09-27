<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h2>Edit Profile</h2>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Profile Update Form --}}
        <form action="{{ route('Caregiver.update') }}" method="POST" enctype="multipart/form-data">
            <form action="#" method="POST" enctype="multipart/form-data">
            {{-- CSRF Token --}}

            @csrf

            {{-- Name --}}
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $user->name ?? '') }}" required>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="{{ old('email', $user->email ?? '') }}" required>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Phone --}}
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control"
                    value="{{ old('phone', $user->contact_number ?? '') }}">
                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Address --}}
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control"
                    value="{{ old('address', $caregiver->address ?? '') }}">
                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Skills --}}
            <div class="mb-3">
                <label for="skills" class="form-label">Skills</label>
                <input type="text" name="skills" id="skills" class="form-control"
                    value="{{ old('skills', $caregiver->skills ?? '') }}">
                @error('skills') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Professional Field --}}
            <div class="mb-3">
                <label for="field" class="form-label">Professional Field</label>
                <select name="field" id="field" class="form-control">
                    <option value="">-- Select Field --</option>
                    <option value="Elder care" {{ old('field', $caregiver->field ?? '') == 'Elder care' ? 'selected' : '' }}>Elder care</option>
                    <option value="Child care" {{ old('field', $caregiver->field ?? '') == 'Child care' ? 'selected' : '' }}>Child care</option>
                    <option value="Therapy" {{ old('field', $caregiver->field ?? '') == 'Therapy' ? 'selected' : '' }}>Therapy</option>
                    <option value="Lab activity" {{ old('field', $caregiver->field ?? '') == 'Lab activity' ? 'selected' : '' }}>Lab activity</option>
                    <option value="Others" {{ old('field', $caregiver->field ?? '') == 'Others' ? 'selected' : '' }}>Others</option>
                </select>
                @error('field') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Bio --}}
            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <textarea name="bio" id="bio" class="form-control">{{ old('bio', $caregiver->bio ?? '') }}</textarea>
                @error('bio') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Certificate --}}
            <div class="mb-3">
                <label for="certificate" class="form-label">Upload Certificate (optional)</label>
                <input type="file" name="certificate" id="certificate" class="form-control">
                @error('certificate') <small class="text-danger">{{ $message }}</small> @enderror

                @if(!empty($caregiver->certificate_path))
                    <div class="mt-2">
                        <p>Current Certificate: <a href="{{ asset('storage/' . $caregiver->certificate_path) }}" target="_blank">View File</a></p>
                    </div>
                @endif
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
</body>
</html>
