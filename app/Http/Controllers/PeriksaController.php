<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DaftarPoli;
use App\Models\Periksa;
use App\Models\Obat;
use App\Models\DetailPeriksa;

class PeriksaController extends Controller
{
    //Controller Periksa
    public function index()
    {
        $hariIndo = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
        ];
        $hariIni = now()->format('l'); // Senin, Selasa, ...
        $hariDB = $hariIndo[$hariIni] ?? $hariIni; // Senin, Selasa, ...

        $dokter = Auth::user()->dokter;
        $jadwal = $dokter->jadwalPeriksa()->where('hari', $hariIni)->pluck('id');

        $daftarPasien = DaftarPoli::with('pasien.user')
            ->whereIn('jadwal_periksa_id', $jadwal)
            ->where('status', 'belum')
            ->get();

        return view('dokter.periksa.index', compact('daftarPasien'));
    }

    public function form($id)
    {
        $poli = DaftarPoli::with('pasien.user')->findOrFail($id);
        $obats = Obat::all();

        return view('dokter.periksa.form', compact('poli'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'required',
            'biaya' => 'required|numeric|min:0',
            'obat' => 'required|array'
        ]);

        $periksa = Periksa::create([
            'id_daftar_poli' => $id,
            'tanggal_periksa' => now()->toDateString(),
            'catatan' => $request->catatan,
            'biaya_periksa' => $request->biaya
        ]);

        // Simpan semua obat ke detail_periksa
        foreach ($request->obat as $id_obat) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat' => $id_obat
            ]);
        }

        // Ubah status pasien jadi "sudah"
        DaftarPoli::where('id', $id)->update(['status' => 'sudah']);

        return redirect()->route('periksa.index')->with('success', 'Pemeriksaan berhasil disimpan.');
    }
}
