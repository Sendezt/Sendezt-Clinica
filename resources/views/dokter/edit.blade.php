@extends('layout.header', ['title' => 'Edit Profil Dokter'])

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <h1>Edit Profil Dokter</h1>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <form method="POST" action="{{ route('dokter.profil.update') }}">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', Auth::user()->email) }}" required>
      </div>

      <div class="form-group">
        <label>Password (Kosongkan jika tidak diubah)</label>
        <input type="password" name="password" class="form-control" placeholder="Password baru (opsional)">
      </div>

      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $dokter->nama) }}" required>
      </div>

      <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $dokter->alamat) }}" required>
      </div>

      <div class="form-group">
        <label>No HP</label>
        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $dokter->no_hp) }}" required>
      </div>

      <div class="form-group">
        <label>Poli</label>
        <select name="id_poli" class="form-control" required>
          @foreach($polis as $poli)
            <option value="{{ $poli->id }}" {{ $dokter->id_poli == $poli->id ? 'selected' : '' }}>
              {{ $poli->nama }}
            </option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      <a href="{{ route('dokter.dashboard') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</section>
@endsection
