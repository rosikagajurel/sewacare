<!-- Other navbar links -->

<li class="nav-item">
    <form method="POST" action="{{ route('logout') }}" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-link nav-link" style="display:inline; padding:0;">Logout</button>
    </form>
</li>
