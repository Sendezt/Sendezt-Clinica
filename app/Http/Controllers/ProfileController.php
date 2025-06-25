<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Poli;

class ProfileController extends Controller
{
    public function edit()
    {
        $dokter = Auth::user()->dokter;
        $polis = Poli::all();
        return view('dokter.edit', compact('dokter', 'polis'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'id_poli' => 'required|exists:polis,id',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:6',
        ]);

        $user = Auth::user();
        $dokter = $user->dokter;

        // Update tabel users
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        // Update tabel dokters
        $dokter->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli,
        ]);

        return redirect()->route('dokter.dashboard')->with('success', 'Profil berhasil diperbarui.');
    }
}
