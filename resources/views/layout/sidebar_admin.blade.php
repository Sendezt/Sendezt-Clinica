<!-- Sidebar Admin -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{ route('admin.dashboard') }}" class="brand-link">
    <span class="brand-text font-weight-light">Admin Klinik</span>
  </a>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column">
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.dokter') }}" class="nav-link {{ request()->routeIs('admin.dokter') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-md"></i>
            <p>Dokter</p>
          </a>
        </li>
        <!-- Tambahkan menu lain jika perlu -->
        <li class="nav-item">
          <a href="{{ route('admin.pasien') }}" class="nav-link {{ request()->routeIs('admin.pasien') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-md"></i>
            <p>Pasien</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.poli') }}" class="nav-link {{ request()->routeIs('admin.poli') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-md"></i>
            <p>Poli</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.obat') }}" class="nav-link {{ request()->routeIs('admin.obat') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-md"></i>
            <p>Obat</p>
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
