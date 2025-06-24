@extends('layout.header', ['title' => 'Dashboard Pasien'])

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h3>Selamat Datang, {{ $pasien->nama }}</h3>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="card">
        <div class="card-header bg-info">
          <h5 class="card-title">Form Pendaftaran ke Poli</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('pasien.daftar_poli') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="jadwal_periksa_id">Pilih Jadwal & Poli</label>
              <select name="jadwal_periksa_id" id="jadwal_periksa_id" class="form-control" required>
                @foreach ($jadwal as $j)
                  <option value="{{ $j->id }}">
                    {{ $j->dokter->nama }} - {{ $j->dokter->poli->nama }} ({{ $j->hari }}, {{ $j->jam_mulai }} - {{ $j->jam_selesai }})
                  </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="keluhan">Keluhan</label>
              <textarea name="keluhan" id="keluhan" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Daftar</button>
          </form>
        </div>
      </div>

    </div>
  </section>
</div>
@endsection
