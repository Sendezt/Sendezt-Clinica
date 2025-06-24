<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\AdminController;

// ===================
// 🧑‍⚕️ AUTHENTICATION
// ===================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman awal (opsional)
Route::get('/', function () {
    return view('welcome');
});

// ===================
// 🛡️ MIDDLEWARE PROTECTED ROUTES
// ===================

// -------- ADMIN --------
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth', 'role:admin');
Route::get('/admin/dokter', [DokterController::class, 'index'])->name('admin.dokter')->middleware('auth', 'role:admin');
Route::get('/admin/dokter/create', [DokterController::class, 'create'])->name('admin.dokter.create')->middleware('auth', 'role:admin');
Route::post('/admin/dokter/store', [DokterController::class, 'store'])->name('admin.dokter.store')->middleware('auth', 'role:admin');
Route::get('/admin/dokter/edit/{id}', [DokterController::class, 'edit'])->name('admin.dokter.edit')->middleware('auth', 'role:admin');
Route::put('/admin/dokter/update/{id}', [DokterController::class, 'update'])->name('admin.dokter.update')->middleware('auth', 'role:admin');
Route::delete('/admin/dokter/delete/{id}', [DokterController::class, 'destroy'])->name('admin.dokter.delete')->middleware('auth', 'role:admin');
// -------- PASIEN --------
Route::get('/admin/pasien', [AdminController::class, 'index'])->name('admin.pasien')->middleware('auth', 'role:admin');
Route::get('/admin/pasien/create', [AdminController::class, 'create'])->name('admin.pasien.create')->middleware('auth', 'role:admin');
Route::post('/admin/pasien/store', [AdminController::class, 'store'])->name('admin.pasien.store')->middleware('auth', 'role:admin');
Route::get('/admin/pasien/edit/{id}', [AdminController::class, 'edit'])->name('admin.pasien.edit')->middleware('auth', 'role:admin');
Route::put('/admin/pasien/update/{id}', [AdminController::class, 'update'])->name('admin.pasien.update')->middleware('auth', 'role:admin');
Route::delete('/admin/pasien/delete/{id}', [AdminController::class, 'destroy'])->name('admin.pasien.delete')->middleware('auth', 'role:admin');

Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.dashboard');
    Route::post('/pasien/daftar-poli', [PasienController::class, 'daftarPoli'])->name('pasien.daftar_poli');
});
