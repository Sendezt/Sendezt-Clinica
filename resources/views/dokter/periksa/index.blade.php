@extends('layout.header', ['title' => 'Pemeriksaan Pasien'])

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Pemeriksaan Pasien Hari Ini</h1>
  </section>

  <section class="content">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
      <div class="card-body">
        <table class="table table-bordered">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Nama Pasien</th>
              <th>No Antrian</th>
              <th>Keluhan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($daftarPasien as $poli)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  {{ optional($poli->pasien)->nama ?? optional($poli->pasien->user)->name ?? '-' }}
                </td>
                <td>{{ $poli->no_antrian }}</td>
                <td>{{ $poli->keluhan }}</td>
                <td>
                  <a href="{{ route('periksa.form', $poli->id) }}" class="btn btn-primary btn-sm">Periksa</a>
                </td>
              </tr>
            @empty
              <tr><td colspan="5" class="text-center">Tidak ada pasien hari ini</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
@endsection
