<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
    .gradient-bg {
      background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    }
    .input-focus:focus {
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
    }
  </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
  <div class="w-full max-w-md">
    <!-- Logo -->
    <div class="text-center mb-8">
      <a href="/" class="inline-block text-center hover:opacity-80 transition duration-200">
        <div class="w-20 h-20 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
          <i class="fas fa-heartbeat text-white text-3xl"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-800">Sendezt<span class="text-blue-600">Clinica</span></h1>
      </a>
      <p class="text-gray-600 mt-2">Buat akun pasien baru</p>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
      <div class="gradient-bg p-4 text-white">
        <h2 class="text-xl font-semibold">Form Registrasi Pasien</h2>
      </div>

      <div class="p-6">
        <!-- Error Handling -->
        @if ($errors->any())
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- Form -->
        <form action="{{ route('register') }}" method="POST" class="space-y-4">
          @csrf

          <!-- Username -->
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
            <div class="relative">
              <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-lg input-focus" placeholder="Username" value="{{ old('name') }}" required>
            </div>
          </div>

          <!-- Email -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg input-focus" placeholder="email@example.com" value="{{ old('email') }}" required>
          </div>

          <!-- Password -->
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg input-focus" required>
          </div>

          <!-- Konfirmasi Password -->
          <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-3 py-2 border rounded-lg input-focus" required>
          </div>

          <!-- Nama Lengkap -->
          <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" class="w-full px-3 py-2 border rounded-lg input-focus" placeholder="Nama Lengkap" value="{{ old('nama') }}" required>
          </div>

          <!-- Alamat -->
          <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
            <textarea id="alamat" name="alamat" rows="2" class="w-full px-3 py-2 border rounded-lg input-focus" placeholder="Alamat lengkap" required>{{ old('alamat') }}</textarea>
          </div>

          <!-- No KTP -->
          <div>
            <label for="no_ktp" class="block text-sm font-medium text-gray-700 mb-1">Nomor KTP</label>
            <input type="text" id="no_ktp" name="no_ktp" class="w-full px-3 py-2 border rounded-lg input-focus" placeholder="Nomor KTP" value="{{ old('no_ktp') }}" required>
          </div>

          <!-- No HP -->
          <div>
            <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
            <input type="text" id="no_hp" name="no_hp" class="w-full px-3 py-2 border rounded-lg input-focus" placeholder="08xxxxxxxxxx" value="{{ old('no_hp') }}" required>
          </div>

          <!-- Submit -->
          <button type="submit" class="w-full gradient-bg text-white py-2 px-4 rounded-lg hover:opacity-90 transition duration-200 font-medium flex items-center justify-center">
            <i class="fas fa-user-plus mr-2"></i> Daftar Sekarang
          </button>
        </form>

        <!-- Link ke Login -->
        <div class="mt-6 text-center">
          <p class="text-sm text-gray-600">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:text-blue-500">Login di sini</a>
          </p>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="mt-6 text-center text-sm text-gray-500">
      <p>© 2025 HealthCare+. All rights reserved.</p>
    </div>
  </div>
</body>
</html>
