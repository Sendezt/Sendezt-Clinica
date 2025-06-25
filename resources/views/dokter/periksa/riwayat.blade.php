@extends('layout.header', ['title' => 'Riwayat Pemeriksaan'])

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Riwayat Pemeriksaan</h1>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Nama Pasien</th>
              <th>Tanggal Periksa</th>
              <th>Biaya</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($riwayat as $i => $r)
            <tr>
              <td>{{ $i + 1 }}</td>
              <td>{{ $r->pasien->nama }}</td>
              <td>{{ $r->periksa->tanggal_periksa ?? '-' }}</td>
              <td>Rp{{ number_format($r->periksa->biaya_periksa ?? 0, 0, ',', '.') }}</td>
              <td>
                <a href="{{ route('dokter.riwayat.detail', $r->id) }}" class="btn btn-sm btn-info">Detail</a>
              </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center">Belum ada riwayat</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
@endsection
