@extends('admin.layouts.app')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }

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

    .logo-img {
        max-height: 50px;
    }

    .badge {
        font-size: 0.9rem;
    }
</style>

<div class="container-fluid">
    <div class="row">
        {{-- Sidebar --}}
        <div class="col-lg-2 col-md-3 sidebar p-3">
            <div class="text-left mb-4">
                <a href="{{ route('caregiver.dashboard') }}">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="SewaCare Logo" class="img-fluid logo-img">
                </a>
            </div>
            <nav class="nav flex-column">
                <a class="nav-link" href="{{ route('caregiver.dashboard') }}">Dashboard</a>
                <a class="nav-link active" href="{{ route('caregiver.bookings') }}">My Bookings</a>
                {{-- <a class="nav-link" href="{{ route('caregiver.tasks') }}">Update Tasks</a> --}}
                <a class="nav-link" href="{{ route('Caregiver.edit') }}">My Profile</a>
                {{-- <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a> --}}
            </nav>
        </div>

        {{-- Main Content --}}
        <div class="col-md-9 col-lg-10 p-4">
            <div class="card shadow-sm p-4">
                <h2 class="mb-4">My Bookings</h2>

                {{-- Upcoming Bookings --}}
                <h5 class="text-info">Upcoming Bookings</h5>
                @forelse ($upcomingBookings as $index => $booking)
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Patient Name</th>
                                    <th>Service</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ optional(optional($booking->patient)->user)->name ?? 'No patient info' }}</td>
                                    <td>{{ optional($booking->service)->service_name ?? 'No service info' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->date_time)->format('Y-m-d') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->date_time)->format('h:i A') }}</td>
                                    <td>{{ $booking->location }}</td>
                                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                                    <td>
                                        <form action="{{ route('caregiver.bookings.complete', $booking->booking_id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-sm btn-success">Mark as Completed</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @empty
                    <p class="text-muted">No upcoming bookings.</p>
                @endforelse

                {{-- Completed Bookings --}}
                <h5 class="mt-5 text-success">Completed Bookings</h5>
                @forelse ($completedBookings as $index => $booking)
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered table-hover bg-light">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Patient Name</th>
                                    <th>Service</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ optional(optional($booking->patient)->user)->name ?? 'No patient info' }}</td>
                                    <td>{{ optional($booking->service)->service_name ?? 'No service info' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->date_time)->format('Y-m-d') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->date_time)->format('h:i A') }}</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @empty
                    <p class="text-muted">No completed bookings yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
