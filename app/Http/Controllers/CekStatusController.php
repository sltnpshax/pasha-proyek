<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranSiswa;
use Illuminate\Http\Request;

class CekStatusController extends Controller
{
    public function index()
    {
        return view('cek-status');
    }

    public function search(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string',
        ], [
            'keyword.required' => 'Masukkan NISN atau Nama Pendaftar!',
        ]);

        $keyword = $request->input('keyword');

        // Cari berdasarkan NISN atau Nama Lengkap
        $siswa = PendaftaranSiswa::where('nisn', $keyword)
            ->orWhere('nama_lengkap', 'LIKE', "%{$keyword}%")
            ->first();

        return view('cek-status', compact('siswa', 'keyword'));
    }
}