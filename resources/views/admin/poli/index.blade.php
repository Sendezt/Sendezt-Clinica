@extends('layout.header', ['title' => 'Kelola Poli'])

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Kelola Poli</h1>
    <a href="{{ route('admin.poli.create') }}" class="btn btn-primary mb-2">Tambah Poli</a>
  </section>

  <section class="content">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($polis as $poli)
        <tr>
          <td>{{ $poli->nama }}</td>
          <td>{{ $poli->keterangan }}</td>
          <td>
            <a href="{{ route('admin.poli.edit', $poli->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('admin.poli.delete', $poli->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Yakin ingin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </section>
</div>
@endsection
