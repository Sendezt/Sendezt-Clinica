@extends('layout.header', ['title' => 'Edit Dokter'])

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="mb-4">Edit Dokter</h1>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card card-body">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $dokter->nama }}" required>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $dokter->alamat }}" required>
          </div>
          <div class="form-group">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $dokter->no_hp }}" required>
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
          <div class="form-group text-right">
            <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
