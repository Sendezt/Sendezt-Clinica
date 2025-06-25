<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column">
    {{-- Dashboard --}}
    <li class="nav-item">
      <a href="{{ route('dokter.dashboard') }}" class="nav-link {{ request()->routeIs('dokter.dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
      </a>
    </li>

    {{-- Edit Profile --}}
    <li class="nav-item">
      <a href="{{ route('dokter.profil.edit') }}" class="nav-link {{ request()->routeIs('dokter.profil.edit') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-cog"></i> {{-- Ikon edit profil --}}
        <p>Edit Profile</p>
      </a>
    </li>

    {{-- Jadwal --}}
    <li class="nav-item">
      <a href="{{ route('jadwal.index') }}" class="nav-link {{ request()->routeIs('jadwal.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-calendar-alt"></i> {{-- Ikon kalender --}}
        <p>Jadwal</p>
      </a>
    </li>

    {{-- Periksa --}}
    <li class="nav-item">
      <a href="{{ route('periksa.index') }}" class="nav-link {{ request()->routeIs('periksa.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-stethoscope"></i> {{-- Ikon pemeriksaan --}}
        <p>Periksa</p>
      </a>
    </li>

    {{-- Riwayat --}}
    <li class="nav-item">
      <a href="{{ route('dokter.riwayat') }}" class="nav-link {{ request()->routeIs('dokter.riwayat') ? 'active' : '' }}">
        <i class="nav-icon fas fa-history"></i> {{-- Ikon histori --}}
        <p>Riwayat</p>
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
