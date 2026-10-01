<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\PendaftaranSiswa;
use Illuminate\Http\Request;


class PendaftaranSiswaController extends Controller
{
    
    public function index()
    {
        $siswa = PendaftaranSiswa::all();
        return view('siswa.index', compact('siswa'));
    }

    // Create (Form Tambah)
    public function create()
    {
        return view('siswa.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|numeric|unique:pendaftaran_siswas,nisn',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'asal_sekolah' => 'required',
            'alamat' => 'required',
        ]);

    $data = $request->all();
    $data['user_id'] = Auth::id();

        PendaftaranSiswa::create($request->all());
        return redirect()->route('siswa.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Edit (Form Edit)
    public function edit(PendaftaranSiswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    
    public function update(Request $request, PendaftaranSiswa $siswa)
    {
        $request->validate([
            'nisn' => 'required|numeric|unique:pendaftaran_siswas,nisn,'.$siswa->id,
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'asal_sekolah' => 'required',
            'alamat' => 'required',
        ]);

        $siswa->update($request->all());
        return redirect()->route('siswa.index')->with('success', 'Data berhasil diperbarui');
    }

    // Delete (Hapus Data)
    public function destroy(PendaftaranSiswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus');
    }
}