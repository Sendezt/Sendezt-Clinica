<!-- Sidebar Admin -->
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
    
    <li class="nav-item">
      <a href="{{ route('admin.pasien') }}" class="nav-link {{ request()->routeIs('admin.pasien') ? 'active' : '' }}">
        <i class="nav-icon fas fa-procedures"></i> {{-- Ikon tempat tidur rumah sakit --}}
        <p>Pasien</p>
      </a>
    </li>
    
    <li class="nav-item">
      <a href="{{ route('admin.poli') }}" class="nav-link {{ request()->routeIs('admin.poli') ? 'active' : '' }}">
        <i class="nav-icon fas fa-hospital-alt"></i> {{-- Ikon gedung rumah sakit --}}
        <p>Poli</p>
      </a>
    </li>
    
    <li class="nav-item">
      <a href="{{ route('admin.obat') }}" class="nav-link {{ request()->routeIs('admin.obat') ? 'active' : '' }}">
        <i class="nav-icon fas fa-pills"></i> {{-- Ikon obat/kapsul --}}
        <p>Obat</p>
      </a>
    </li>

    {{-- Tambahan menu lain jika ada --}}

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
