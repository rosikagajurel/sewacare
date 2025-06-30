@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Upcoming Bookings</h3>
    @forelse ($upcomingBookings as $booking)
        <div class="card p-3 mb-3">
            <p><strong>Patient:</strong> {{ optional(optional($booking->patient)->user)->name ?? 'No patient info' }}</p>
            <p><strong>Service:</strong> {{ optional($booking->service)->service_name ?? 'No service info' }}</p>
            <p><strong>Date & Time:</strong> {{ $booking->date_time }}</p>
            <p><strong>Location:</strong> {{ $booking->location }}</p>

            <form action="{{ route('caregiver.bookings.complete', $booking->booking_id) }}" method="POST">
                @csrf
                <button class="btn btn-success">Mark as Completed</button>
            </form>
        </div>
    @empty
        <p>No upcoming bookings.</p>
    @endforelse

    <h3 class="mt-5">Completed Bookings</h3>
    @forelse ($completedBookings as $booking)
        <div class="card p-3 mb-3 bg-light">
            <p><strong>Patient:</strong> {{ optional(optional($booking->patient)->user)->name ?? 'No patient info' }}</p>
            <p><strong>Service:</strong> {{ optional($booking->service)->service_name ?? 'No service info' }}</p>
            <p><strong>Date & Time:</strong> {{ $booking->date_time }}</p>
            <p><strong>Status:</strong> ✅ Completed</p>
        </div>
    @empty
        <p>No completed bookings yet.</p>
    @endforelse
</div>
@endsection
