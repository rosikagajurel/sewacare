<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SewaCare')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
    <style>
        .summary-card { border-left: 5px solid #0dcaf0; transition: transform 0.2s ease; }
        .summary-card:hover { transform: scale(1.02); }
        .welcome-card { background: #e9f7fc; padding: 1.5rem; border-radius: 10px; }
        .card-accent { border-left: 4px solid #0dcaf0; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

<div class="container-fluid">
    <div class="row min-vh-100">
        {{-- Sidebar --}}
        @include('Patient.layouts.sidebar')

        {{-- Main content --}}
        <div class="col-md-9 col-lg-10 d-flex flex-column p-0">
            {{-- Navbar --}}
            @include('Patient.layouts.navbar')

            <main class="p-4 flex-grow-1">
                @yield('content')
            </main>

            {{-- Footer --}}
            @include('Patient.layouts.footer')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>
