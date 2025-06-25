@extends('layout.header', ['title' => 'Daftar ke Poli'])

@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <h3>Form Pendaftaran ke Poli</h3>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('pasien.daftar_poli') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="jadwal_periksa_id">Pilih Jadwal & Poli</label>
              <select name="jadwal_periksa_id" id="jadwal_periksa_id" class="form-control" required>
                @foreach ($jadwal as $j)
                  <option value="{{ $j->id }}">
                    {{ $j->dokter->poli->nama }} ({{ $j->hari }}, {{ $j->jam_mulai }} - {{ $j->jam_selesai }})
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
@endsection
