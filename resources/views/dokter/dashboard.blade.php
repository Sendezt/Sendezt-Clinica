@extends('layout.header', ['title' => 'Dashboard Dokter'])

@section('content')
  <section class="content-header">
    <h1>Dashboard Dokter</h1>
  </section>

  <section class="content">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @php
      use Carbon\Carbon;

      $dokter = Auth::user()->dokter;
      $jadwalAktif = $dokter->jadwalPeriksa->where('is_active', 1)->first();
      $hariIni = Carbon::now()->locale('id')->isoFormat('dddd'); // Bahasa Indonesia

      $jadwalHariIni = $dokter->jadwalPeriksa->where('hari', $hariIni)->pluck('id');
      $daftarHariIni = \App\Models\DaftarPoli::whereIn('jadwal_periksa_id', $jadwalHariIni)->get();
      $sudah = $daftarHariIni->where('status', 'sudah')->count();
      $belum = $daftarHariIni->where('status', 'belum')->count();
@endphp


    <!-- Informasi Dokter -->
    <div class="card">
      <div class="card-header bg-info">
        <h5 class="card-title">Informasi Dokter</h5>
      </div>
      <div class="card-body">
        <p><strong>Nama:</strong> {{ $dokter->nama }}</p>
        <p><strong>Poli:</strong> {{ $dokter->poli->nama }}</p>
        <p><strong>No HP:</strong> {{ $dokter->no_hp }}</p>
      </div>
    </div>

    <!-- Jadwal Aktif -->
    <div class="card mt-3">
      <div class="card-header bg-success">
        <h5 class="card-title">Jadwal Aktif</h5>
      </div>
      <div class="card-body">
        @if($jadwalAktif)
          <p><strong>Hari:</strong> {{ $jadwalAktif->hari }}</p>
          <p><strong>Jam:</strong> {{ $jadwalAktif->jam_mulai }} - {{ $jadwalAktif->jam_selesai }}</p>
        @else
          <p>Belum ada jadwal aktif.</p>
        @endif
      </div>
    </div>

    <!-- Statistik Pemeriksaan Hari Ini -->
    <div class="row mt-3">
      <div class="col-md-6">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $belum }}</h3>
            <p>Pasien Belum Diperiksa</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-clock"></i>
          </div>
          <a href="{{ route('periksa.index') }}" class="small-box-footer">
            Lihat Pasien <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $sudah }}</h3>
            <p>Pasien Sudah Diperiksa</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-check"></i>
          </div>
          <a href="{{ route('dokter.riwayat') }}" class="small-box-footer">
            Lihat Riwayat <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Navigasi Cepat -->
    <div class="card mt-4">
      <div class="card-header bg-secondary">
        <h5 class="card-title">Navigasi Cepat</h5>
      </div>
      <div class="card-body">
        <a href="{{ route('jadwal.index') }}" class="btn btn-outline-primary m-1">Jadwal Periksa</a>
        <a href="{{ route('dokter.profil.edit') }}" class="btn btn-outline-secondary m-1">Edit Profil</a>
        <a href="{{ route('periksa.index') }}" class="btn btn-outline-success m-1">Periksa Pasien</a>
        <a href="{{ route('dokter.riwayat') }}" class="btn btn-outline-info m-1">Riwayat Pemeriksaan</a>
      </div>
    </div>

  </section>
@endsection
