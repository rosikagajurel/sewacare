<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom mb-4 px-3">
    <div class="container-fluid">
        <span class="navbar-brand fw-semibold text-info">@yield('page-title', 'Dashboard')</span>
        <div class="ms-auto">
            <span class="me-3">Hello, {{ Auth::user()->name }}</span>
            <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>
