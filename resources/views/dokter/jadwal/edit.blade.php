@extends('layout.header', ['title' => 'Edit Jadwal Periksa'])

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Edit Jadwal Periksa</h1>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <form method="POST" action="{{ route('jadwal.update', $jadwal->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label>Hari</label>
          <select name="hari" class="form-control" required>
            @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
              <option value="{{ $hari }}" {{ $jadwal->hari == $hari ? 'selected' : '' }}>{{ $hari }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Jam Mulai</label>
          <input type="time" name="jam_mulai" class="form-control"
            value="{{ \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam_mulai)->format('H:i') }}" required>
        </div>

        <div class="form-group">
          <label>Jam Selesai</label>
          <input type="time" name="jam_selesai" class="form-control"
            value="{{ \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam_selesai)->format('H:i') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </section>
</div>
@endsection
