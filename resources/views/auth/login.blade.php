<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
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
    <!-- Logo dan Header -->
    <div class="text-center mb-8">
      <a href="/" class="inline-block text-center hover:opacity-80 transition duration-200">
        <div class="w-20 h-20 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
          <i class="fas fa-heartbeat text-white text-3xl"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-800">Sendezt<span class="text-blue-600">Clinica</span></h1>
      </a>
      <p class="text-gray-600 mt-2">Sign in to access your medical services</p>
    </div>

    <!-- Card Login -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
      <div class="gradient-bg p-4 text-white">
        <h2 class="text-xl font-semibold">Patient Portal Login</h2>
      </div>

      <div class="p-6">
        <!-- Pesan Error dari Backend -->
        @if ($errors->any())
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4" id="login-form">
          @csrf

          <!-- Email -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-envelope text-gray-400"></i>
              </div>
              <input 
                type="email" 
                id="email" 
                name="email"
                value="{{ old('email') }}"
                class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg input-focus focus:outline-none" 
                placeholder="patient@example.com"
                required
              >
            </div>
          </div>

          <!-- Password -->
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-lock text-gray-400"></i>
              </div>
              <input 
                type="password" 
                id="password" 
                name="password"
                class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg input-focus focus:outline-none" 
                placeholder="••••••••"
                required
              >
            </div>
          </div>

          <!-- Remember Me -->
          <div class="flex items-center justify-between">
            <div class="flex items-center">
              <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
              <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
            </div>
            <a href="#" class="text-sm text-blue-600 hover:text-blue-500">Forgot password?</a>
          </div>

          <!-- Submit -->
          <button type="submit" class="w-full gradient-bg text-white py-2 px-4 rounded-lg hover:opacity-90 transition duration-200 font-medium flex items-center justify-center">
            <i class="fas fa-sign-in-alt mr-2"></i> Sign In
          </button>
        </form>

        <!-- Divider -->
        <div class="relative my-6">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-300"></div>
          </div>
          <div class="relative flex justify-center text-sm">
            <span class="px-2 bg-white text-gray-500">Or continue with</span>
          </div>
        </div>

        <!-- Social Buttons -->
        <div class="grid grid-cols-2 gap-3">
          <button type="button" class="bg-white border border-gray-300 rounded-lg py-2 px-4 flex items-center justify-center text-gray-700 hover:bg-gray-50">
            <i class="fab fa-google text-red-500 mr-2"></i> Google
          </button>
          <button type="button" class="bg-white border border-gray-300 rounded-lg py-2 px-4 flex items-center justify-center text-gray-700 hover:bg-gray-50">
            <i class="fab fa-microsoft text-blue-500 mr-2"></i> Microsoft
          </button>
        </div>

        <!-- Link ke Register -->
        <div class="mt-6 text-center">
          <p class="text-sm text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-600 font-medium hover:text-blue-500">Register here</a>
          </p>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="mt-6 text-center text-sm text-gray-500">
      <p>© 2025 HealthCare+. All rights reserved.</p>
      <div class="mt-2">
        <a href="#" class="text-gray-500 hover:text-gray-700 mx-1">Privacy</a>
        <span>•</span>
        <a href="#" class="text-gray-500 hover:text-gray-700 mx-1">Terms</a>
        <span>•</span>
        <a href="#" class="text-gray-500 hover:text-gray-700 mx-1">Help</a>
      </div>
    </div>
  </div>
</body>
</html>
