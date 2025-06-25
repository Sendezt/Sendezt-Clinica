@extends('layout.header', ['title' => 'Tambah Obat'])

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah Obat</h1>
  </section>

  <section class="content">
    <form action="{{ route('admin.obat.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label>Nama Obat</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Kemasan</label>
        <input type="text" name="kemasan" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Harga Obat</label>
        <input type="number" name="harga_obat" class="form-control" step="0.01" required>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="{{ route('admin.obat') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </section>
</div>
@endsection
