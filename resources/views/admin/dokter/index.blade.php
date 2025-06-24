@extends('layout.header', ['title' => 'Mengelola Dokter'])

@section('content')
<div class="content-wrapper">
  <!-- Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mengelola Dokter</h1>
        </div>
        <div class="col-sm-6 text-right">
          <a href="{{ route('dokter.create') }}" class="btn btn-primary">+ Tambah Dokter</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Dokter</h3>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Poli</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($dokters as $index => $dokter)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $dokter->nama }}</td>
                <td>{{ $dokter->alamat }}</td>
                <td>{{ $dokter->no_hp }}</td>
                <td>{{ $dokter->poli->nama ?? '-' }}</td>
                <td>
                  <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                  </form>
                </td>
              </tr>
              @endforeach
              @if($dokters->isEmpty())
              <tr>
                <td colspan="6" class="text-center">Belum ada data dokter.</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
