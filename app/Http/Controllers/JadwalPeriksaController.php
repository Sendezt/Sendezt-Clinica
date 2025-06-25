<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\JadwalPeriksa;

class JadwalPeriksaController extends Controller
{
    // Jadwal Periksa Controller
    public function index()
    {
        $jadwal = Auth::user()->dokter->jadwalPeriksas;
        return view('dokter.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        return view('dokter.jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        Auth::user()->dokter->jadwalPeriksas()->create([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('dokter.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal = JadwalPeriksa::findOrFail($id);
        return view('dokter.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = JadwalPeriksa::findOrFail($id);

        $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal->update($request->only('hari', 'jam_mulai', 'jam_selesai'));

        return redirect()->route('dokter.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jadwal = JadwalPeriksa::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('dokter.jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
