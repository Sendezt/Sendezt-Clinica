@extends('layout.header', ['title' => 'Dashboard Admin'])

@section('content')
  {{-- Content Header --}}
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">
            Selamat Datang, Admin {{ Auth::user()->name }}
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  {{-- Main content --}}
  <section class="content">
    <div class="container-fluid">

      {{-- Pesan sambutan --}}
      <div class="row">
        <div class="col-12">
          <div class="alert alert-info mb-4">
            <i class="fas fa-info-circle"></i>
            Selamat datang di Sistem Klinik. Silakan pilih menu di sidebar untuk mengelola data.
          </div>
        </div>
      </div>

      {{-- Menu cepat --}}
      <div class="row">
        {{-- Dokter --}}
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              {{-- <h3>{{ $jumlahDokter }}</h3> --}}
              <h3>Dokter</h3>
              <p>Manajemen Dokter</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-md"></i>
            </div>
            <a href="{{ route('admin.dokter') }}" class="small-box-footer">
              Lihat <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        {{-- Pasien --}}
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              {{-- <h3>{{ $jumlahPasien }}</h3> --}}
              <h3>Pasien</h3>
              <p>Manajemen Pasien</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('admin.pasien') }}" class="small-box-footer">
              Lihat <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        {{-- Poli --}}
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              {{-- <h3>{{ $jumlahPoli }}</h3> --}}
              <h3>Poli</h3>
              <p>Manajemen Poli</p>
            </div>
            <div class="icon">
              <i class="fas fa-clinic-medical"></i>
            </div>
            <a href="{{ route('admin.poli') }}" class="small-box-footer">
              Lihat <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        {{-- Obat --}}
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              {{-- <h3>{{ $jumlahObat }}</h3> --}}
              <h3>Obat</h3>
              <p>Manajemen Obat</p>
            </div>
            <div class="icon">
              <i class="fas fa-pills"></i>
            </div>
            <a href="{{ route('admin.obat') }}" class="small-box-footer">
              Lihat <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        {{-- Tambahkan kotak baru di sini jika ada menu tambahan --}}
      </div>
    </div>
  </section>
@endsection
