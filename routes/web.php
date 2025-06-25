<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JadwalPeriksaController;
use App\Http\Controllers\PeriksaController;

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
// Admin Routes
// ===================

// -------- DOKTER --------
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth', 'role:admin');
Route::get('/admin/dokter', [AdminController::class, 'dokterIndex'])->name('admin.dokter')->middleware('auth', 'role:admin');
Route::get('/admin/dokter/create', [AdminController::class, 'dokterCreate'])->name('admin.dokter.create')->middleware('auth', 'role:admin');
Route::post('/admin/dokter/store', [AdminController::class, 'dokterStore'])->name('admin.dokter.store')->middleware('auth', 'role:admin');
Route::get('/admin/dokter/edit/{dokter}', [AdminController::class, 'dokterEdit'])->name('admin.dokter.edit')->middleware('auth', 'role:admin');
Route::put('/admin/dokter/update/{dokter}', [AdminController::class, 'dokterUpdate'])->name('admin.dokter.update')->middleware('auth', 'role:admin');
Route::delete('/admin/dokter/delete/{dokter}', [AdminController::class, 'dokterDestroy'])->name('admin.dokter.delete')->middleware('auth', 'role:admin');
// -------- PASIEN --------
Route::get('/admin/pasien', [AdminController::class, 'pasienIndex'])->name('admin.pasien')->middleware('auth', 'role:admin');
Route::get('/admin/pasien/create', [AdminController::class, 'pasienCreate'])->name('admin.pasien.create')->middleware('auth', 'role:admin');
Route::post('/admin/pasien/store', [AdminController::class, 'pasienStore'])->name('admin.pasien.store')->middleware('auth', 'role:admin');
Route::get('/admin/pasien/edit/{id}', [AdminController::class, 'pasienEdit'])->name('admin.pasien.edit')->middleware('auth', 'role:admin');
Route::put('/admin/pasien/update/{id}', [AdminController::class, 'pasienUpdate'])->name('admin.pasien.update')->middleware('auth', 'role:admin');
Route::delete('/admin/pasien/delete/{id}', [AdminController::class, 'pasienDestroy'])->name('admin.pasien.delete')->middleware('auth', 'role:admin');

// -------- POLI --------
Route::get('/admin/poli', [AdminController::class, 'poliIndex'])->name('admin.poli')->middleware('auth', 'role:admin');
Route::get('/admin/poli/create', [AdminController::class, 'poliCreate'])->name('admin.poli.create')->middleware('auth', 'role:admin');
Route::post('/admin/poli/store', [AdminController::class, 'poliStore'])->name('admin.poli.store')->middleware('auth', 'role:admin');
Route::get('/admin/poli/edit/{id}', [AdminController::class, 'poliEdit'])->name('admin.poli.edit')->middleware('auth', 'role:admin');
Route::put('/admin/poli/update/{id}', [AdminController::class, 'poliUpdate'])->name('admin.poli.update')->middleware('auth', 'role:admin');
Route::delete('/admin/poli/delete/{id}', [AdminController::class, 'poliDestroy'])->name('admin.poli.delete')->middleware('auth', 'role:admin');

// -------- OBAT --------
Route::get('/admin/obat', [AdminController::class, 'obatIndex'])->name('admin.obat')->middleware('auth', 'role:admin');
Route::get('/admin/obat/create', [AdminController::class, 'obatCreate'])->name('admin.obat.create')->middleware('auth', 'role:admin');
Route::post('/admin/obat/store', [AdminController::class, 'obatStore'])->name('admin.obat.store')->middleware('auth', 'role:admin');
Route::get('/admin/obat/edit/{id}', [AdminController::class, 'obatEdit'])->name('admin.obat.edit')->middleware('auth', 'role:admin');
Route::put('/admin/obat/update/{id}', [AdminController::class, 'obatUpdate'])->name('admin.obat.update')->middleware('auth', 'role:admin');
Route::delete('/admin/obat/delete/{id}', [AdminController::class, 'obatDestroy'])->name('admin.obat.delete')->middleware('auth', 'role:admin');

// ===================
// Pasien Routes
// ===================
Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.dashboard');
    Route::post('/pasien/daftar-poli', [PasienController::class, 'daftarPoli'])->name('pasien.daftar_poli');
});

// ===================
// Dokter Routes
// ===================
Route::middleware(['auth', 'role:dokter'])->group(function () {
    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.dashboard');

    // Edit Profil Dokter
    Route::get('/dokter/profil/edit', [ProfileController::class, 'edit'])->name('dokter.profil.edit');
    Route::put('/dokter/profil/update', [ProfileController::class, 'update'])->name('dokter.profil.update');

    // Jadwal Periksa
    Route::get('/dokter/jadwal', [JadwalPeriksaController::class, 'index'])->name('jadwal.index');
    Route::get('/dokter/jadwal/create', [JadwalPeriksaController::class, 'create'])->name('jadwal.create');
    Route::post('/dokter/jadwal/store', [JadwalPeriksaController::class, 'store'])->name('jadwal.store');
    Route::get('/dokter/jadwal/edit/{id}', [JadwalPeriksaController::class, 'edit'])->name('jadwal.edit');
    Route::put('/dokter/jadwal/update/{id}', [JadwalPeriksaController::class, 'update'])->name('jadwal.update');
    Route::delete('/dokter/jadwal/delete/{id}', [JadwalPeriksaController::class, 'destroy'])->name('jadwal.delete');
    Route::post('/jadwal/{id}/toggle', [JadwalPeriksaController::class, 'toggleStatus'])->name('jadwal.toggle');


    // Periksa Pasien
    Route::get('/dokter/periksa', [PeriksaController::class, 'index'])->name('periksa.index');
    Route::get('/dokter/periksa/{id}', [PeriksaController::class, 'show'])->name('periksa.show');
    Route::post('/dokter/periksa/{id}', [PeriksaController::class, 'store'])->name('periksa.store');

    // Riwayat Pasien
    Route::get('/dokter/pasien/riwayat', [PeriksaController::class, 'riwayat'])->name('dokter.riwayat');
    Route::get('/dokter/pasien/riwayat/{id}', [PeriksaController::class, 'riwayatDetail'])->name('dokter.riwayat.detail');
});
