<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column">
    <li class="nav-item">
      <a href="{{ route('pasien.dashboard') }}" class="nav-link {{ request()->routeIs('pasien.dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('pasien.dashboard') }}" class="nav-link {{ request()->routeIs('pasien.dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Daftar Poli</p>
      </a>
    </li>
    <!-- Tambahan lainnya -->
    <li class="nav-item">
      <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="nav-icon fas fa-sign-out-alt"></i><p>Logout</p>
      </a>
    </li>
  </ul>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
