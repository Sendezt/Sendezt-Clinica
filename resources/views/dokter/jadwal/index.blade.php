@extends('layout.header', ['title' => 'Jadwal Periksa'])

@section('content')
<div class="content-wrapper">
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
    <th>Aksi</th>
  </tr>
</thead>
<tbody>
  @forelse($jadwal as $j)
    <tr>
      <td>{{ $j->hari }}</td>
      <td>{{ $j->jam_mulai }}</td>
      <td>{{ $j->jam_selesai }}</td>
      <td>
        <a href="{{ route('jadwal.edit', $j->id) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('jadwal.delete', $j->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin ingin hapus?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
        </form>
      </td>
    </tr>
  @empty
    <tr>
      <td colspan="4" class="text-center">Belum ada jadwal</td>
    </tr>
  @endforelse
</tbody>
          </table>
        </div>
      </div>

    </div>
  </section>
</div>
@endsection
