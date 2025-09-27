<!-- Header -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Patient Dashboard - SewaCare')</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <style>
    .summary-card {
      border-left: 5px solid #0dcaf0;
      transition: transform 0.2s ease;
    }
    .summary-card:hover {
      transform: scale(1.02);
    }
    .welcome-card {
      background: #e9f7fc;
      padding: 1.5rem;
      border-radius: 10px;
    }
  </style>
</head>
