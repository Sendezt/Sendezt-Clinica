@extends('layout.header', ['title' => 'Form Pemeriksaan'])

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Form Pemeriksaan</h1>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <h5>Pasien: {{ $daftarPoli->pasien->nama }}</h5>
        <p><strong>Keluhan:</strong> {{ $daftarPoli->keluhan }}</p>

        <form action="{{ route('dokter.periksa.store', $daftarPoli->id) }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Tanggal Periksa</label>
            <input type="date" name="tanggal_periksa" class="form-control" required value="{{ now()->format('Y-m-d') }}">
          </div>

          <div class="form-group">
            <label>Catatan</label>
            <textarea name="catatan" class="form-control" rows="4" required></textarea>
          </div>

          <div class="form-group">
            <label>Biaya Periksa</label>
            <input type="number" name="biaya_periksa" class="form-control" required>
          </div>

          <button type="submit" class="btn btn-success">Simpan Pemeriksaan</button>
          <a href="{{ route('dokter.periksa.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </section>
</div>
@endsection
