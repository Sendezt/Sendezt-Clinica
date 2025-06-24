@extends('layout.header', ['title' => 'Edit Pasien'])

@section('content')
<div class="content-wrapper">
  <section class="content pt-3">
    <div class="container-fluid">
      <h4>Edit Pasien</h4>

      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('admin.pasien.update', $pasien->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label>Nama Pasien</label>
          <input type="text" name="nama" class="form-control" value="{{ $pasien->nama }}" required>
        </div>

        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" class="form-control" required>{{ $pasien->alamat }}</textarea>
        </div>

        <div class="form-group">
          <label>No KTP</label>
          <input type="text" name="no_ktp" class="form-control" value="{{ $pasien->no_ktp }}" required>
        </div>

        <div class="form-group">
          <label>No HP</label>
          <input type="text" name="no_hp" class="form-control" value="{{ $pasien->no_hp }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.pasien') }}" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </section>
</div>
@endsection
