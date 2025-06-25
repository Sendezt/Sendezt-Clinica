@extends('layout.header', ['title' => 'Edit Obat'])

@section('content')
  <section class="content-header">
    <h1>Edit Obat</h1>
  </section>

  <section class="content">
    <form action="{{ route('admin.obat.update', $obat->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label>Nama Obat</label>
        <input type="text" name="nama" class="form-control" value="{{ $obat->nama }}" required>
      </div>
      <div class="form-group">
        <label>Kemasan</label>
        <input type="text" name="kemasan" class="form-control" value="{{ $obat->kemasan }}" required>
      </div>
      <div class="form-group">
        <label>Harga Obat</label>
        <input type="number" name="harga_obat" class="form-control" step="0.01" value="{{ $obat->harga_obat }}" required>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="{{ route('admin.obat') }}" class="btn btn-secondary">Batal</a>
    </form>
  </section>
@endsection
