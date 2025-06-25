@extends('layout.header', ['title' => 'Dashboard Pasien'])

@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <h3>Selamat Datang, {{ $pasien->nama }}</h3>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <!-- Informasi Pasien -->
      <div class="card mb-4">
        <div class="card-header bg-info">
          <h5 class="card-title">Informasi Pasien</h5>
        </div>
        <div class="card-body">
          <p><strong>Nama:</strong> {{ $pasien->nama }}</p>
          <p><strong>No. RM:</strong> {{ $pasien->no_rm }}</p>
          <p><strong>Alamat:</strong> {{ $pasien->alamat }}</p>
          <p><strong>No. HP:</strong> {{ $pasien->no_hp }}</p>
        </div>
      </div>

      <!-- Tombol Daftar Poli -->
      <div class="mb-4">
        <a href="{{ route('pasien.form_daftar_poli') }}" class="btn btn-primary">Daftar ke Poli</a>
      </div>

      <!-- Riwayat Pemeriksaan -->
      <div class="card">
        <div class="card-header bg-secondary">
          <h5 class="card-title">Riwayat Pemeriksaan</h5>
        </div>
        <div class="card-body">
          @if($pasien->daftarPoli->isEmpty())
            <p>Belum ada riwayat pemeriksaan.</p>
          @else
            <ul class="list-group">
              @foreach($pasien->daftarPoli as $daftar)
                @if($daftar->periksa)
                  <li class="list-group-item">
                    <strong>Tanggal:</strong> {{ $daftar->periksa->tanggal_periksa }} <br>
                    <strong>Catatan:</strong> {{ $daftar->periksa->catatan }} <br>
                    <strong>Obat:</strong>
                    <ul>
                      @foreach($daftar->periksa->detailPeriksa as $detail)
                        <li>{{ $detail->obat->nama }} ({{'Rp. '. $detail->obat->harga_obat }})</li>
                      @endforeach
                    </ul>
                  </li>
                @endif
              @endforeach
            </ul>
          @endif
        </div>
      </div>

    </div>
  </section>
@endsection
