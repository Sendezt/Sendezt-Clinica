@extends('layout.header', ['title' => 'Tambah Poli'])

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah Poli</h1>
  </section>

  <section class="content">
    <form action="{{ route('admin.poli.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label>Nama Poli</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control" required></textarea>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="{{ route('admin.poli') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </section>
</div>
@endsection
