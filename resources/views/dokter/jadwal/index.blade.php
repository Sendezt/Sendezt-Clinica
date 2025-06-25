@extends('layout.header', ['title' => 'Jadwal Periksa'])

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <h1>Jadwal Periksa</h1>
  </div>
</section>

<section class="content">
  <div class="container-fluid">

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form Tambah Jadwal -->
    <div class="mb-3">
      <a href="{{ route('jadwal.create') }}" class="btn btn-primary">+ Tambah Jadwal</a>
    </div>

    <!-- Tabel Jadwal -->
    <div class="card">
      <div class="card-header">Jadwal Tersimpan</div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Hari</th>
              <th>Jam Mulai</th>
              <th>Jam Selesai</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @forelse($jadwal as $j)
              <tr>
                <td>{{ $j->hari }}</td>
                <td>{{ $j->jam_mulai }}</td>
                <td>{{ $j->jam_selesai }}</td>
                <td>
                  <form action="{{ route('jadwal.toggle', $j->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                      class="btn btn-sm {{ $j->is_active ? 'btn-success' : 'btn-secondary' }}"
                      onclick="return confirm('Yakin ingin {{ $j->is_active ? 'menonaktifkan' : 'mengaktifkan' }} jadwal ini?')">
                      {{ $j->is_active ? 'Aktif' : 'Nonaktif' }}
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center">Belum ada jadwal</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </div>
</section>
@endsection
