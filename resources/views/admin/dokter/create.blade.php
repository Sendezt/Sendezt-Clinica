@extends('layout.header', ['title' => 'Tambah Dokter'])

@section('content')
<div class="content-wrapper">
  <section class="content pt-3">
    <div class="container-fluid">
      <h4>Tambah Dokter</h4>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('admin.dokter.store') }}" method="POST">
        @csrf

        <div class="card mb-3">
          <div class="card-header bg-primary text-white">
            Data Akun Dokter
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Nama Login</label>
              <input type="text" name="name" class="form-control" placeholder="Contoh: dr. Andi" required>
            </div>

            <div class="form-group">
              <label>Email Login</label>
              <input type="email" name="email" class="form-control" placeholder="Contoh: dokter@example.com" required>
            </div>

            <div class="form-group">
              <label>Password Login</label>
              <input type="password" name="password" class="form-control" required>
            </div>
          </div>
        </div>

        <div class="card mb-3">
          <div class="card-header bg-success text-white">
            Data Dokter
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <textarea name="alamat" class="form-control" required></textarea>
            </div>

            <div class="form-group">
              <label>No HP</label>
              <input type="text" name="no_hp" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Pilih Poli</label>
              <select name="id_poli" class="form-control" required>
                <option value="">-- Pilih Poli --</option>
                @foreach ($polis as $poli)
                  <option value="{{ $poli->id }}">{{ $poli->nama }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-success">Simpan Dokter</button>
        <a href="{{ route('admin.dokter') }}" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </section>
</div>
@endsection
