<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\PendaftaranSiswa;
use Illuminate\Http\Request;

class PendaftaranPublikController extends Controller
{
    // Menampilkan halaman form pendaftaran publik
    public function create()
    {
        return view('pendaftaran.create');
    }

    // Menyimpan data yang diisi oleh siswa
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn'          => 'required|unique:pendaftaran_siswas,nisn',
            'nama_lengkap'  => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'asal_sekolah'  => 'required',
            'alamat'        => 'required',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto-siswa', 's3');
        }

        $userId = Auth::id();
        if (!$userId) {
            return redirect()->back()->with('error', 'Sesi login kamu terputus atau tidak terbaca! Silakan login ulang.');
        }

        $validated['user_id'] = Auth::id();
        PendaftaranSiswa::create($validated);

        return redirect()->back()->with('success', 'Pendaftaran berhasil dikirim!');
    }
}