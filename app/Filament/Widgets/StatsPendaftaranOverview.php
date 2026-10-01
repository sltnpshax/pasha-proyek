<?php

namespace App\Filament\Widgets;

use App\Models\PendaftaranSiswa;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsPendaftaranOverview extends BaseWidget
{
    // Pengaturan refresh otomatis (opsional: setiap 15 detik)
    protected static ?string $pollingInterval = '15s';

    protected function getStats(): array
    {
        $totalPendaftar = PendaftaranSiswa::count();
        $jumlahDiterima = PendaftaranSiswa::where('status', 'diterima')->count();
        $jumlahDitolak = PendaftaranSiswa::where('status', 'ditolak')->count();
        $jumlahPending = PendaftaranSiswa::where('status', 'pending')->count();

        return [
            Stat::make('Total Pendaftar', $totalPendaftar)
                ->description('Keseluruhan berkas masuk')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info'),

            Stat::make('Siswa Diterima', $jumlahDiterima)
                ->description('Lolos verifikasi & seleksi')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make('Siswa Ditolak', $jumlahDitolak)
                ->description('Tidak memenuhi kriteria')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),

            Stat::make('Menunggu Verifikasi', $jumlahPending)
                ->description('Perlu ditinjau panitia')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
        ];
    }
}