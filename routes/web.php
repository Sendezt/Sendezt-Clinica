<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;

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
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboardAdmin');

    Route::resource('dokter', DokterController::class); // /admin/dokter
});
