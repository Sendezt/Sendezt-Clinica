<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JadwalPeriksa;
use App\Models\Pasien;

class JadwalPeriksaController extends Controller
{
    public function index()
    {
        $jadwal = JadwalPeriksa::where('id_dokter', Auth::user()->dokter->id)->get();
        return view('dokter.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        return view('dokter.jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|string',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        $dokterId = Auth::user()->dokter->id;

        // Cek bentrok dengan jadwal dokter itu sendiri
        $bentrokPribadi = JadwalPeriksa::where('id_dokter', $dokterId)
            ->where('hari', $request->hari)
            ->where(function ($query) use ($request) {
                $query->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhere(function ($q) use ($request) {
                        $q->where('jam_mulai', '<', $request->jam_mulai)
                            ->where('jam_selesai', '>', $request->jam_selesai);
                    });
            })->exists();

        if ($bentrokPribadi) {
            return back()->withErrors(['Jadwal bertabrakan dengan jadwal Anda sendiri.'])->withInput();
        }

        // Cek bentrok dengan jadwal dokter lain
        $bentrokGlobal = JadwalPeriksa::where('id_dokter', '!=', $dokterId)
            ->where('hari', $request->hari)
            ->where(function ($query) use ($request) {
                $query->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhere(function ($q) use ($request) {
                        $q->where('jam_mulai', '<', $request->jam_mulai)
                            ->where('jam_selesai', '>', $request->jam_selesai);
                    });
            })->exists();

        if ($bentrokGlobal) {
            return back()->withErrors(['Jadwal ini sudah diambil oleh dokter lain.'])->withInput();
        }

        // Jika is_active dicentang, nonaktifkan yang lain
        if ($request->has('is_active')) {
            JadwalPeriksa::where('id_dokter', $dokterId)->update(['is_active' => false]);
        }

        JadwalPeriksa::create([
            'id_dokter' => $dokterId,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal = JadwalPeriksa::where('id', $id)
            ->where('id_dokter', Auth::user()->dokter->id)
            ->firstOrFail();

        return view('dokter.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required|string',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        $jadwal = JadwalPeriksa::where('id', $id)
            ->where('id_dokter', Auth::user()->dokter->id)
            ->firstOrFail();

        $today = now()->translatedFormat('l');
        if (strtolower($today) === strtolower($jadwal->hari)) {
            return back()->withErrors(['Jadwal hari ini tidak boleh diubah.'])->withInput();
        }

        // Cek bentrok dengan jadwal dokter itu sendiri
        $bentrokPribadi = JadwalPeriksa::where('id_dokter', $jadwal->id_dokter)
            ->where('id', '!=', $id)
            ->where('hari', $request->hari)
            ->where(function ($query) use ($request) {
                $query->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhere(function ($q) use ($request) {
                        $q->where('jam_mulai', '<', $request->jam_mulai)
                            ->where('jam_selesai', '>', $request->jam_selesai);
                    });
            })->exists();

        if ($bentrokPribadi) {
            return back()->withErrors(['Jadwal Anda bentrok dengan jadwal Anda yang lain.'])->withInput();
        }

        // Cek bentrok dengan jadwal dokter lain
        $bentrokGlobal = JadwalPeriksa::where('id_dokter', '!=', $jadwal->id_dokter)
            ->where('hari', $request->hari)
            ->where(function ($query) use ($request) {
                $query->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhere(function ($q) use ($request) {
                        $q->where('jam_mulai', '<', $request->jam_mulai)
                            ->where('jam_selesai', '>', $request->jam_selesai);
                    });
            })->exists();

        if ($bentrokGlobal) {
            return back()->withErrors(['Jadwal ini sudah digunakan oleh dokter lain.'])->withInput();
        }

        // Handle status aktif
        if ($request->has('is_active')) {
            JadwalPeriksa::where('id_dokter', $jadwal->id_dokter)
                ->where('id', '!=', $jadwal->id)
                ->update(['is_active' => false]);
        }

        $jadwal->update([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        return redirect()->route('jadwal.index')
            ->withErrors(['Jadwal tidak dapat dihapus karena berkaitan dengan riwayat periksa.']);
    }

    public function toggleStatus($id)
    {
        $dokterId = Auth::user()->dokter->id;

        $jadwal = JadwalPeriksa::where('id', $id)
            ->where('id_dokter', $dokterId)
            ->firstOrFail();

        if ($jadwal->is_active) {
            $jadwal->update(['is_active' => false]);
        } else {
            JadwalPeriksa::where('id_dokter', $dokterId)->update(['is_active' => false]);
            $jadwal->update(['is_active' => true]);
        }

        return redirect()->route('jadwal.index')->with('success', 'Status jadwal berhasil diperbarui.');
    }
}
