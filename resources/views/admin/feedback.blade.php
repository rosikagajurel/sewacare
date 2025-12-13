@extends('admin.layouts.app')


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Feedback - Admin | SewaCare</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    .table-responsive {
      margin-top: 20px;
    }
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-9 col-lg-10 p-4">
      <h2 class="mb-4">Patient Feedback</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th>SN</th>
              <th>Patient</th>
              <th>Caregiver</th>
              <th>Feedback</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
@forelse($reviews as $index => $review)
<tr>
    <td>{{ $index + 1 }}</td>
    <td>{{ $review->patient->name ?? 'Unknown' }}</td>
    <td>{{ $review->caregiver->name ?? 'Unknown' }}</td>
    <td>{{ $review->review_text }}</td>
    <td>{{ $review->created_at->format('Y-m-d') }}</td>
    <td>
        <form action="{{ route('admin.reviews.delete', $review->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"
                    onclick="return confirm('Delete this review?')">
                Delete
            </button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center">No reviews found</td>
</tr>
@endforelse
</tbody>

        </table>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
