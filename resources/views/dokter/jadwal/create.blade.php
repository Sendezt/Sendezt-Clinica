@extends('layout.header', ['title' => 'Tambah Jadwal Periksa'])

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <h1>Tambah Jadwal Periksa</h1>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <form action="{{ route('jadwal.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label>Hari</label>
        <select name="hari" class="form-control" required>
          <option value="">-- Pilih Hari --</option>
          @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
            <option value="{{ $hari }}">{{ $hari }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label>Jam Mulai</label>
        <input type="time" name="jam_mulai" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Jam Selesai</label>
        <input type="time" name="jam_selesai" class="form-control" required>
      </div>
      
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</section>
@endsection
