<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column">
    {{-- Dashboard --}}
    <li class="nav-item">
      <a href="{{ route('pasien.dashboard') }}" class="nav-link {{ request()->routeIs('pasien.dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
      </a>
    </li>

    {{-- Daftar Poli --}}
    <li class="nav-item">
      <a href="{{ route('pasien.daftar_poli') }}" class="nav-link {{ request()->routeIs('pasien.form_daftar_poli') ? 'active' : '' }}">
        <i class="nav-icon fas fa-notes-medical"></i> {{-- Ikon pendaftaran layanan medis --}}
        <p>Daftar Poli</p>
      </a>
    </li>

    {{-- Logout --}}
    <li class="nav-item">
      <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>Logout</p>
      </a>
    </li>
  </ul>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>
