<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminController extends Controller
{
    // ================= PASIEN ================= //

    public function pasienIndex(Request $request)
    {
        $keyword = $request->input('keyword');

        $pasiens = Pasien::with('user')
            ->when($keyword, function ($query, $keyword) {
                $query->where('nama', 'like', "%{$keyword}%")
                    ->orWhere('no_rm', 'like', "%{$keyword}%")
                    ->orWhere('no_ktp', 'like', "%{$keyword}%");
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.pasien.index', compact('pasiens', 'keyword'));
    }

    public function pasienCreate()
    {
        return view('admin.pasien.create');
    }

    public function pasienStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'nama' => 'required',
            'alamat' => 'required',
            'no_ktp' => 'required|unique:pasiens,no_ktp',
            'no_hp' => 'required|unique:pasiens,no_hp',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pasien',
        ]);

        $now = Carbon::now();
        $prefix = $now->format('Ym');

        $lastPasien = Pasien::where('no_rm', 'like', $prefix . '-%')
            ->orderByDesc('no_rm')
            ->first();

        $newNumber = $lastPasien ? ((int) explode('-', $lastPasien->no_rm)[1] + 1) : 1;
        $no_rm = $prefix . '-' . $newNumber;

        Pasien::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'no_rm' => $no_rm,
        ]);

        return redirect()->route('admin.pasien')->with('success', 'Pasien berhasil ditambahkan.');
    }

    public function pasienEdit($id)
    {
        $pasien = Pasien::with('user')->findOrFail($id);
        return view('admin.pasien.edit', compact('pasien'));
    }

    public function pasienUpdate(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);
        $user = $pasien->user;

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_ktp' => 'required|unique:pasiens,no_ktp,' . $id,
            'no_hp' => 'required|unique:pasiens,no_hp,' . $id,
        ]);

        $user->update(['name' => $request->nama]);
        $pasien->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('admin.pasien')->with('success', 'Pasien berhasil diupdate.');
    }

    public function pasienDestroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->user->delete();
        $pasien->delete();

        return redirect()->route('admin.pasien')->with('success', 'Pasien berhasil dihapus.');
    }

    // ================= DOKTER ================= //

    public function dokterIndex()
    {
        $dokters = Dokter::with(['poli', 'user'])
            ->whereHas('user', fn($q) => $q->where('role', 'dokter'))
            ->get();

        return view('admin.dokter.index', compact('dokters'));
    }

    public function dokterCreate()
    {
        $polis = Poli::all();
        return view('admin.dokter.create', compact('polis'));
    }

    public function dokterStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|unique:dokters,no_hp',
            'id_poli' => 'required|exists:polis,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'dokter',
        ]);

        Dokter::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli,
        ]);

        return redirect()->route('admin.dokter')->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function dokterEdit(Dokter $dokter)
    {
        $polis = Poli::all();
        return view('admin.dokter.edit', compact('dokter', 'polis'));
    }

    public function dokterUpdate(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|unique:dokters,no_hp,' . $dokter->id,
            'id_poli' => 'required|exists:polis,id',
        ]);

        $dokter->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli,
        ]);

        return redirect()->route('admin.dokter')->with('success', 'Dokter berhasil diupdate.');
    }

    public function dokterDestroy(Dokter $dokter)
    {
        $dokter->user->delete();
        $dokter->delete();

        return redirect()->route('admin.dokter')->with('success', 'Dokter berhasil dihapus.');
    }

    // ================= POLI ================= //
    public function poliIndex()
    {
        $polis = Poli::all();
        return view('admin.poli.index', compact('polis'));
    }

    public function poliCreate()
    {
        return view('admin.poli.create');
    }

    public function poliStore(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:polis,nama',
            'keterangan' => 'required',
        ]);

        Poli::create($request->only('nama', 'keterangan'));

        return redirect()->route('admin.poli')->with('success', 'Poli berhasil ditambahkan.');
    }

    public function poliEdit($id)
    {
        $poli = Poli::findOrFail($id);
        return view('admin.poli.edit', compact('poli'));
    }

    public function poliUpdate(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:polis,nama,' . $id,
            'keterangan' => 'required',
        ]);

        $poli = Poli::findOrFail($id);
        $poli->update($request->only('nama', 'keterangan'));

        return redirect()->route('admin.poli')->with('success', 'Poli berhasil diupdate.');
    }

    public function poliDestroy($id)
    {
        $poli = Poli::findOrFail($id);
        $poli->delete();

        return redirect()->route('admin.poli')->with('success', 'Poli berhasil dihapus.');
    }
}
