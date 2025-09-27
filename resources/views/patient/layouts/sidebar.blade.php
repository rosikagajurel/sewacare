<!-- Sidebar / Navbar -->
<div class="col-md-3 col-lg-2 bg-light border-end p-3">
  <h4 class="text-info mb-4">SewaCare</h4>
  <ul class="nav flex-column">
    <li class="nav-item mb-2">
      <a href="{{ route('patient.dashboard') }}" class="nav-link">Dashboard</a>
    </li>
    <li class="nav-item mb-2">
      <a href="#" class="nav-link">Bookings</a>
    </li>
    <li class="nav-item mb-2">
      <a href="#" class="nav-link">Services</a>
    </li>
    <li class="nav-item mb-2">
      <a href="#" class="nav-link">Lab Reports</a>
    </li>
    <li class="nav-item">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm mt-3">Logout</button>
      </form>
    </li>
  </ul>
</div>
