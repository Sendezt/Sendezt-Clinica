@include('layout.header', ['title' => 'Dashboard Admin'])

<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item menu-open">
      <a href="{{ route('dashboardAdmin') }}" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('dashboardAdmin') }}" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Mengelola Dokter</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('dashboardAdmin') }}" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>Mengelola Pasien</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('dashboardAdmin') }}" class="nav-link">
        <i class="nav-icon fas fa-clinic-medical"></i>
        <p>Mengelola Poli</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('dashboardAdmin') }}" class="nav-link">
        <i class="nav-icon fas fa-capsules"></i>
        <p>Mengelola Obat</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>Logout</p>
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>

  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Selamat Datang Admin {{ Optional(Auth::user())->nama }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
