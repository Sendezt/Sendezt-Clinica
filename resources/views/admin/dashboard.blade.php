@extends('layout.header', ['title' => 'Dashboard Admin'])

@section('content')

  <!-- Content Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Selamat Datang, Admin {{ Auth::user()->name }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes atau menu cepat -->
      <div class="row">
        <div class="col-12">
          <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> Selamat datang di Sistem Klinik. Silakan pilih menu di sidebar untuk mengelola data.
          </div>
        </div>
      </div>

      <!-- Tempat konten tambahan -->
      <div class="row">
        <div class="col-md-3">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>Dokter</h3>
              <p>Manajemen Dokter</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-md"></i>
            </div>
            <a href="{{ route('admin.dokter') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- Tambahkan kotak lainnya untuk pasien, poli, dll -->
      </div>
    </div>
  </section>
@endsection
