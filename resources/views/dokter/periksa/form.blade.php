@extends('layout.header', ['title' => 'Form Pemeriksaan'])

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Form Pemeriksaan</h1>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <h5>Pasien: {{ $poli->pasien->nama }}</h5>
        <p><strong>Keluhan:</strong> {{ $poli->keluhan }}</p>

        <form action="{{ route('periksa.store', $poli->id) }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Tanggal Periksa</label>
            <input type="date" name="tanggal_periksa" class="form-control" required value="{{ now()->format('Y-m-d') }}" readonly>
          </div>

          <div class="form-group">
            <label>Catatan</label>
            <textarea name="catatan" class="form-control" rows="4" required></textarea>
          </div>

          <div class="form-group">
            <label>Obat yang Diberikan</label>
            @foreach($obats as $obat)
              <div class="form-check">
                <input type="checkbox" name="obat[]" value="{{ $obat->id }}" class="form-check-input" id="obat{{ $obat->id }}">
                <label class="form-check-label" for="obat{{ $obat->id }}">
                  {{ $obat->nama }} - Rp {{ number_format($obat->harga_obat, 0, ',', '.') }}
                </label>
              </div>
            @endforeach
          </div>

          <button type="submit" class="btn btn-success">Simpan Pemeriksaan</button>
          <a href="{{ route('periksa.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </section>
</div>
@endsection
