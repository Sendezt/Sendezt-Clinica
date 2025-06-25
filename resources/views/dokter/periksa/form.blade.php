@extends('layout.header', ['title' => 'Form Periksa'])

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Periksa Pasien</h1>
  </section>

  <section class="content">
    <div class="container-fluid">
      <form action="{{ route('periksa.store', $poli->id) }}" method="POST">
        @csrf
        <div class="form-group">
          <label>Nama Pasien</label>
          <input type="text" class="form-control" value="{{ $poli->pasien->user->name }}" disabled>
        </div>

        <div class="form-group">
          <label>Keluhan</label>
          <textarea class="form-control" disabled>{{ $poli->keluhan }}</textarea>
        </div>

        <div class="form-group">
          <label>Diagnosa</label>
          <textarea name="diagnosa" class="form-control" required></textarea>
        </div>

        <div class="form-group">
          <label>Catatan</label>
          <textarea name="catatan" class="form-control"></textarea>
        </div>

        <div class="form-group">
          <label>Biaya</label>
          <input type="number" name="biaya" class="form-control" required>
        </div>

        <div class="form-group">
  <label>Obat yang Diberikan</label>
  <select name="obat[]" class="form-control" multiple required>
    @foreach($obats as $obat)
      <option value="{{ $obat->id }}">
        {{ $obat->nama }} ({{ $obat->kemasan }}) - Rp {{ number_format($obat->harga_obat, 0, ',', '.') }}
      </option>
    @endforeach
  </select>
  <small class="text-muted">Gunakan Ctrl (Windows) / Cmd (Mac) untuk memilih lebih dari satu</small>
</div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('periksa.index') }}" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </section>
</div>
@endsection
