@extends('layout.header', ['title' => 'Dashboard Dokter'])

@section('content')
<div class="content-wrapper">
  <!-- Header -->
  <section class="content-header">
    <div class="container-fluid">
      <h1>Dashboard Dokter</h1>
    </div>
  </section>

  <!-- Konten -->
  <section class="content">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="container-fluid">
      <div class="row">

        <!-- Kartu Informasi Dokter -->
        <div class="col-md-12 mb-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Selamat datang, dr. {{ Auth::user()->dokter->nama ?? Auth::user()->name }}</h3>
            </div>
            <div class="card-body">
              <p><strong>Poli:</strong> {{ Auth::user()->dokter->poli->nama ?? '-' }}</p>
              <p><strong>No HP:</strong> {{ Auth::user()->dokter->no_hp ?? '-' }}</p>
              <p><strong>Alamat:</strong> {{ Auth::user()->dokter->alamat ?? '-' }}</p>
            </div>
          </div>
        </div>

        <!-- Navigasi Fitur -->
        <div class="col-md-6">
          <a href="{{ route('dokter.dashboard') }}" class="btn btn-primary btn-block">✏️ Perbarui Data Dokter</a>
        </div>
        <div class="col-md-6">
          <a href="{{ route('dokter.dashboard') }}" class="btn btn-success btn-block">🗓️ Input Jadwal Periksa</a>
        </div>
        <div class="col-md-6 mt-3">
          <a href="{{ route('dokter.dashboard') }}" class="btn btn-warning btn-block">💊 Periksa Pasien</a>
        </div>
        <div class="col-md-6 mt-3">
          <a href="{{ route('dokter.dashboard') }}" class="btn btn-info btn-block">📋 Riwayat Pasien</a>
        </div>

      </div>
    </div>
  </section>
</div>
@endsection
