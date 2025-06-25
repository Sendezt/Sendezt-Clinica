<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\DaftarPoli;
use App\Models\Periksa;
use App\Models\Obat;
use App\Models\DetailPeriksa;

class PeriksaController extends Controller
{
    // Menampilkan daftar pasien hari ini
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

        $hariIni = now()->format('l');
        $hariDB = $hariIndo[$hariIni] ?? $hariIni;

        $dokter = Auth::user()->dokter;
        $jadwal = $dokter->jadwalPeriksa()->where('hari', $hariDB)->pluck('id');

        $daftarPasien = DaftarPoli::with(['pasien.user'])
            ->whereIn('jadwal_periksa_id', $jadwal)
            ->where('status', 'belum')
            ->get();


        // $nowTime = now()->format('H:i:s');
        // dd([
        //     'now' => now()->format('Y-m-d H:i:s'),
        //     'now_time' => $nowTime,
        //     'hariIni' => $hariIni,
        //     'hariDB' => $hariDB,
        //     'jadwal_ditemukan' => $jadwal,
        // ]);


        return view('dokter.periksa.index', compact('daftarPasien'));
    }

    // Tampilkan form periksa
    public function show($id)
    {
        $poli = DaftarPoli::with('pasien.user')->findOrFail($id);
        $obats = Obat::all();

        return view('dokter.periksa.form', compact('poli', 'obats'));
    }

    // Simpan hasil pemeriksaan
    public function store(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'required',
            'obat' => 'required|array',
        ]);

        $jasaDokter = 150000;

        $obats = Obat::whereIn('id', $request->obat)->get();
        $totalHargaObat = $obats->sum('harga_obat');

        $totalBiaya = $jasaDokter + $totalHargaObat;

        $periksa = Periksa::create([
            'id_daftar_poli' => $id,
            'tanggal_periksa' => now()->toDateString(),
            'catatan' => $request->catatan,
            'biaya_periksa' => $totalBiaya,
        ]);

        foreach ($obats as $obat) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat' => $obat->id
            ]);
        }

        DaftarPoli::where('id', $id)->update(['status' => 'sudah']);

        return redirect()->route('periksa.index')->with('success', 'Pemeriksaan berhasil disimpan. Total biaya: Rp ' . number_format($totalBiaya, 0, ',', '.'));
    }

    // Menampilkan daftar riwayat
    public function riwayat()
    {
        $dokter = Auth::user()->dokter;
        $jadwalIds = $dokter->jadwalPeriksa->pluck('id');

        $riwayat = DaftarPoli::with(['pasien', 'periksa'])
            ->whereIn('jadwal_periksa_id', $jadwalIds)
            ->where('status', 'sudah')
            ->orderByDesc('id')
            ->get();

        return view('dokter.periksa.riwayat', compact('riwayat'));
    }

    // Menampilkan detail riwayat
    public function riwayatDetail($id)
    {
        $data = DaftarPoli::with([
            'pasien',
            'periksa.detailPeriksa.obat'
        ])->findOrFail($id);

        return view('dokter.periksa.detail_riwayat', compact('data'));
    }
}
