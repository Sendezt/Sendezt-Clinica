@extends('layout.header', ['title' => 'Kelola Obat'])

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Kelola Obat</h1>
    <a href="{{ route('admin.obat.create') }}" class="btn btn-primary mb-2">Tambah Obat</a>
  </section>

  <section class="content">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Kemasan</th>
          <th>Harga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($obats as $obat)
        <tr>
          <td>{{ $obat->nama }}</td>
          <td>{{ $obat->kemasan }}</td>
          <td>Rp {{ number_format($obat->harga_obat, 0, ',', '.') }}</td>
          <td>
            <a href="{{ route('admin.obat.edit', $obat->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('admin.obat.delete', $obat->id) }}" method="POST" style="display:inline;">
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
