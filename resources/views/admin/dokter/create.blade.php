@extends('layout.header', ['title' => 'Tambah Dokter'])

@section('content')
<div class="content-wrapper">
  <section class="content pt-3">
    <div class="container-fluid">
      <form action="{{ route('admin.dokter.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input type="text" name="alamat" class="form-control" required>
        </div>
        <div class="form-group">
          <label>No HP</label>
          <input type="text" name="no_hp" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Poli</label>
          <select name="id_poli" class="form-control" required>
            @foreach($polis as $poli)
              <option value="{{ $poli->id }}">{{ $poli->nama }}</option>
            @endforeach
          </select>
        </div>
        <button class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </section>
</div>
@endsection
