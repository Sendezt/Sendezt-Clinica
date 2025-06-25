@extends('layout.header', ['title' => 'Edit Poli'])

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Poli</h1>
  </section>

  <section class="content">
    <form action="{{ route('admin.poli.update', $poli->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label>Nama Poli</label>
        <input type="text" name="nama" class="form-control" value="{{ $poli->nama }}" required>
      </div>
      <div class="form-group">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control" required>{{ $poli->keterangan }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="{{ route('admin.poli') }}" class="btn btn-secondary">Batal</a>
    </form>
  </section>
</div>
@endsection
