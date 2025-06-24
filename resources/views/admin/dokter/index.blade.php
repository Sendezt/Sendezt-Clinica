@extends('layout.header', ['title' => 'Kelola Dokter'])

@section('content')
<div class="content-wrapper">
  <section class="content pt-3">
    <div class="container-fluid">
      <a href="{{ route('admin.dokter.create') }}" class="btn btn-primary mb-3">Tambah Dokter</a>
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Poli</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($dokters as $dokter)
          <tr>
            <td>{{ "dr." . $dokter->nama }}</td>
            <td>{{ $dokter->poli->nama ?? '-' }}</td>
            <td>{{ $dokter->alamat }}</td>
            <td>{{ $dokter->no_hp }}</td>
            <td>{{ $dokter->user->email }}</td>
            <td>
              <a href="{{ route('admin.dokter.edit', $dokter->id) }}" class="btn btn-sm btn-warning">Edit</a>
              <form action="{{ route('admin.dokter.delete', $dokter->id) }}" method="POST" style="display:inline-block">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus dokter ini?')">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
</div>
@endsection
