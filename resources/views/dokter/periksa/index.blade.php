@extends('layout.header', ['title' => 'Periksa Pasien'])

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Pasien Hari Ini</h1>
  </section>

  <section class="content">
    <div class="container-fluid">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nama Pasien</th>
            <th>Keluhan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($daftarPasien as $p)
            <tr>
              <td>{{ $p->pasien->user->name }}</td>
              <td>{{ $p->keluhan }}</td>
              <td>
                <a href="{{ route('periksa.form', $p->id) }}" class="btn btn-sm btn-primary">Periksa</a>
              </td>
            </tr>
          @empty
            <tr><td colspan="3">Tidak ada pasien</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </section>
</div>
@endsection
