<?php

namespace App\Filament\Widgets;

use App\Models\PendaftaranSiswa;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    // Mengatur agar statistik tampil paling atas (urutan ke-1)
    protected static ?int $sort = 1;

    // Nama fungsi getStats() harus ditulis di sini:
    protected function getStats(): array
    {
        return [
            Stat::make('Total Pendaftar', PendaftaranSiswa::count())
                ->description('Jumlah keseluruhan siswa')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),
                
            Stat::make('Pendaftar Hari Ini', PendaftaranSiswa::whereDate('created_at', today())->count())
                ->description('Siswa mendaftar hari ini')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('info'),
        ];
    }
}