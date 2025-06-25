@extends('layout.header', ['title' => 'Detail Pemeriksaan'])

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Detail Pemeriksaan</h1>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <h5>Nama Pasien: {{ $data->pasien->nama }}</h5>
        <p><strong>Tanggal Periksa:</strong> {{ $data->periksa->tanggal_periksa }}</p>
        <p><strong>Keluhan:</strong> {{ $data->keluhan }}</p>
        <p><strong>Catatan Dokter:</strong> {{ $data->periksa->catatan }}</p>
        <p><strong>Biaya Periksa:</strong> Rp{{ number_format($data->periksa->biaya_periksa, 0, ',', '.') }}</p>

        <h6>Obat Diberikan:</h6>
        <ul>
          @forelse($data->periksa->detailPeriksa as $detail)
            <li>{{ $detail->obat->nama }}</li>
          @empty
            <li>Tidak ada obat</li>
          @endforelse
        </ul>

        <a href="{{ route('dokter.riwayat') }}" class="btn btn-secondary mt-3">Kembali</a>
      </div>
    </div>
  </section>
</div>
@endsection
