<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use App\Models\DaftarPoli;
use App\Models\Pasien;
use App\Models\Poli;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $pasien = Pasien::where('user_id', $user->id)->first();

        $polis =    Poli::all(); // Ambil semua poli
        $jadwal = JadwalPeriksa::with('dokter.poli')
            ->where('is_active', true)
            ->get();

        return view('pasien.dashboard', compact('pasien', 'polis', 'jadwal'));
    }

    public function daftarPoli(Request $request)
    {
        $request->validate([
            'jadwal_periksa_id' => 'required|exists:jadwal_periksas,id',
            'keluhan' => 'nullable|string|max:255',
        ]);

        $pasien = Pasien::where('user_id', Auth::id())->first();

        $noAntrian = DaftarPoli::where('jadwal_periksa_id', $request->jadwal_periksa_id)->count() + 1;

        DaftarPoli::create([
            'id_pasien' => $pasien->id,
            'jadwal_periksa_id' => $request->jadwal_periksa_id,
            'keluhan' => $request->keluhan,
            'no_antrian' => $noAntrian,
        ]);

        return redirect()->route('pasien.dashboard')->with('success', 'Berhasil daftar ke poli.');
    }

    public function riwayat($id)
    {
        $pasien = Pasien::with(['daftarPolis.periksa.detailPeriksas.obat'])->findOrFail($id);
        return view('dokter.pasien.riwayat', compact('pasien'));
    }
}
