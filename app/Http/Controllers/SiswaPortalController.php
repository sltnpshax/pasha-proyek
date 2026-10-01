<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranSiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SiswaPortalController extends Controller
{
  
    public function index()
    {
        return view('siswa.form-pendaftaran');
    }

 
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

   
    if ($request->hasFile('foto')) {
        $validated['foto'] = $request->file('foto')->store('foto-siswa', 's3');
    }


    $userId = Auth::id();
    if (!$userId) {
        return redirect()->back()->with('error', 'Sesi login terputus! Silakan login ulang.');
    }
    $validated['user_id'] = $userId;

    PendaftaranSiswa::create($validated);

    return redirect()->route('dashboard')->with('success', 'Pendaftaran berhasil dikirim!');
}

    public function cekStatus()
    {

        $user = Auth::user();


        $pendaftaran = \App\Models\PendaftaranSiswa::where('id', $user->id)->first();


        return view('cek-status', compact('user', 'pendaftaran'));
    }

    public function cetakKartu()
    {
        $user = Auth::user();

        $siswa = PendaftaranSiswa::where('user_id', Auth::id())->first();

        if (!$siswa) {
        return redirect()->back()->with('error', 'Data pendaftaran belum ditemukan!');
    }

        $pdf = Pdf::loadView('siswa.cetak-kartu', compact('siswa', 'user'));
        return $pdf->download('Kartu-Pendaftaran-Siswa.pdf');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
