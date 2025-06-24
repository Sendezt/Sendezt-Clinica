@extends('layout.header', ['title' => 'Edit Dokter'])

@section('content')
<div class="content-wrapper">
  <section class="content pt-3">
    <div class="container-fluid">
      <form action="{{ route('admin.dokter.update', $dokter->id) }}" method="POST">
        @csrf
        @method('PUT')
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
              <option value="{{ $poli->id }}" {{ $poli->id == $dokter->id_poli ? 'selected' : '' }}>{{ $poli->nama }}</option>
            @endforeach
          </select>
        </div>
        <button class="btn btn-success">Update</button>
      </form>
    </div>
  </section>
</div>
@endsection
