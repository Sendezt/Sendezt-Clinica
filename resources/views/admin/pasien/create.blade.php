@extends('layout.header', ['title' => 'Tambah Pasien'])

@section('content')
<div class="content-wrapper">
  <section class="content pt-3">
    <div class="container-fluid">
      <h4>Tambah Pasien Baru</h4>

      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('admin.pasien.store') }}" method="POST">
        @csrf

        <div class="form-group">
          <label>Nama User Login</label>
          <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Email User Login</label>
          <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Password User Login</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <hr>

        <div class="form-group">
          <label>Nama Pasien</label>
          <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" class="form-control" required></textarea>
        </div>

        <div class="form-group">
          <label>No KTP</label>
          <input type="text" name="no_ktp" class="form-control" required>
        </div>

        <div class="form-group">
          <label>No HP</label>
          <input type="text" name="no_hp" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.pasien') }}" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </section>
</div>
@endsection
