<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use App\Models\DaftarPoli;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $pasien = Pasien::where('user_id', $user->id)->first();
        $jadwal = JadwalPeriksa::with('dokter.poli')->get();

        return view('pasien.dashboard', compact('pasien', 'jadwal'));
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
}
