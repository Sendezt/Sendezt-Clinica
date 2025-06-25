<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarPoli;
use App\Models\Periksa;
use App\Models\DetailPeriksa;
use App\Models\Obat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PeriksaController extends Controller
{
    // ================= PERIKSA ================= //
    public function antrianHariIni()
    {
        $dokterId = Auth::user()->dokter->id;
        $hariIni = now()->translatedFormat('l');

        $daftar = DaftarPoli::with('pasien')
            ->whereHas('jadwal', function ($q) use ($dokterId, $hariIni) {
                $q->where('id_dokter', $dokterId)->where('hari', $hariIni);
            })
            ->whereDate('created_at', now()->toDateString())
            ->get();

        return view('dokter.periksa.antrian', compact('daftar'));
    }

    public function formPeriksa($id)
    {
        $daftar = DaftarPoli::with('pasien')->findOrFail($id);
        $obats = Obat::all();
        return view('dokter.periksa.form', compact('daftar', 'obats'));
    }

    public function simpanPeriksa(Request $request, $id)
    {
        $request->validate([
            'keluhan' => 'required',
            'diagnosa' => 'required',
            'biaya' => 'required|numeric',
            'obat' => 'array',
        ]);

        $periksa = Periksa::create([
            'id_daftar' => $id,
            'keluhan' => $request->keluhan,
            'diagnosa' => $request->diagnosa,
            'biaya' => $request->biaya,
        ]);

        foreach ($request->obat ?? [] as $id_obat) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat' => $id_obat,
            ]);
        }

        return redirect()->route('dokter.antrian')->with('success', 'Pemeriksaan selesai.');
    }
}
