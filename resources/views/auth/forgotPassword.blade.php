@extends('layouts.app') {{-- or your admin layout --}}

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Admin – Forgot Password</h3>

    {{-- Status Message --}}
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form action="{{ route('admin.password.email') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" id="email" class="form-control" required>
            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="btn btn-primary">Send Reset Link</button>
    </form>
</div>
@endsection
