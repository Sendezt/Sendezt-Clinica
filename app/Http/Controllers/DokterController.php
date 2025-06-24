<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::with(['poli', 'user'])
            ->whereHas('user', function ($query) {
                $query->where('role', 'dokter');
            })
            ->get();
        return view('admin.dokter.index', compact('dokters'));
    }

    public function create()
    {
        $polis = Poli::all();
        return view('admin.dokter.create', compact('polis'));
    }

    public function store(Request $request)
    {
        Dokter::create([
            'user_id' => $request->user_id, // Assuming user_id is passed from the form
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli,
        ]);

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function edit(Dokter $dokter)
    {
        $polis = Poli::all();
        return view('admin.dokter.edit', compact('dokter', 'polis'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $dokter->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli,
        ]);

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil diupdate.');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil dihapus.');
    }
}
