<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'dokter') {
                return redirect()->route('dokter.dashboard');
            } elseif ($user->role == 'pasien') {
                return redirect()->route('pasien.dashboard');
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_ktp' => 'required|string|max:20|unique:pasiens,no_ktp',
            'no_hp' => 'required|string|max:15|unique:pasiens,no_hp',
        ]);

        // Ambil tahun dan bulan saat ini
        $now = Carbon::now();
        $year = $now->year;
        $month = str_pad($now->month, 2, '0', STR_PAD_LEFT);

        // Hitung Pasien
        $countInMonth = Pasien::whereYear('created_at', $year)->whereMonth('created_at', $month)->count();

        // Buat nomor rekam medis
        $no_rm = $year . $month . '-' . ($countInMonth + 1);

        // Simpan User
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => 'pasien',
        ]);

        // Simpan Pasien
        Pasien::create([
            'user_id' => $user->id,
            'nama' => $validatedData['nama'],
            'alamat' => $validatedData['alamat'],
            'no_ktp' => $validatedData['no_ktp'],
            'no_hp' => $validatedData['no_hp'],
            'no_rm' => $no_rm,
        ]);

        Auth::login($user);
        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }
}
