@extends('layout.header', ['title' => 'Kelola Pasien'])

@section('content')
<div class="content-wrapper">
  <section class="content pt-3">
    <div class="container-fluid">
      <h4>Data Pasien</h4>

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <form method="GET" action="{{ route('admin.pasien') }}" class="mb-3">
        <div class="input-group">
          <input type="text" name="keyword" class="form-control" placeholder="Cari Nama, No RM, atau No KTP" value="{{ request('keyword') }}">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
            <a href="{{ route('admin.pasien') }}" class="btn btn-outline-danger">Reset</a>
          </div>
        </div>
      </form>

      <a href="{{ route('admin.pasien.create') }}" class="btn btn-primary mb-2">Tambah Pasien</a>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No RM</th>
            <th>Nama</th>
            <th>No KTP</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($pasiens as $pasien)
            <tr>
              <td>{{ $pasien->no_rm }}</td>
              <td>{{ $pasien->nama }}</td>
              <td>{{ $pasien->no_ktp }}</td>
              <td>{{ $pasien->no_hp }}</td>
              <td>{{ $pasien->alamat }}</td>
              <td>
                <a href="{{ route('admin.pasien.edit', $pasien->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.pasien.delete', $pasien->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus pasien?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center">Tidak ada data pasien.</td>
            </tr>
          @endforelse
        </tbody>
      </table>

    </div>
  </section>
</div>
@endsection
