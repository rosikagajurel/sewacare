@extends('caregiver.layouts.app')

@section('content')
<style>
    .card {
        border-left: 5px solid #0dcaf0;
    }

    .badge {
        font-size: 0.9rem;
    }
</style>

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
@endsection
