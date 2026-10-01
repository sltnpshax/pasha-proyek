<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaPortalController;
use App\Http\Controllers\CekStatusController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cek-status', [CekStatusController::class, 'index'])->name('cek-status.index');
Route::post('/cek-status', [CekStatusController::class, 'search'])->name('cek-status.search');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [SiswaPortalController::class, 'dashboard'])->name('dashboard');
    
   
    Route::get('/pendaftaran', [SiswaPortalController::class, 'index'])->name('siswa.form');
    Route::post('/pendaftaran', [SiswaPortalController::class, 'store'])->name('siswa.store');
    
   
    Route::get('/siswa/status', [SiswaPortalController::class, 'cekStatus'])->name('siswa.status');
    Route::get('/siswa/cetak-kartu', [SiswaPortalController::class, 'cetakKartu'])->name('siswa.cetak-kartu');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';