<!-- Sidebar Pasien -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{ route('pasien.dashboard') }}" class="brand-link">
    <span class="brand-text font-weight-light">Pasien</span>
  </a>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column">
        <li class="nav-item">
          <a href="{{ route('pasien.dashboard') }}" class="nav-link {{ request()->routeIs('pasien.dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-house-user"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i><p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
