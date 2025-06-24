<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'Dashboard' }}</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  {{-- Include sidebar sesuai role --}}
  @auth
    @if (Auth::user()->role === 'admin')
      @include('layout.sidebar_admin')
    @elseif (Auth::user()->role === 'dokter')
      @include('layout.sidebar_dokter')
    @elseif (Auth::user()->role === 'pasien')
      @include('layout.sidebar_pasien')
    @endif
  @endauth

  {{-- Yield konten utama --}}
  @yield('content')

  <footer class="main-footer text-center">
    <strong>&copy; {{ date('Y') }} Klinik.</strong>
  </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
