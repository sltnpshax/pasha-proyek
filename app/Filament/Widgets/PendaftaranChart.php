<?php

namespace App\Filament\Widgets;

use App\Models\PendaftaranSiswa;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class PendaftaranChart extends ChartWidget
{
    protected static ?string $heading = 'Tren Pendaftaran Siswa (7 Hari Terakhir)';

    protected static ?int $sort = 2; // Menempatkan widget di bawah StatsOverview

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $data = [];
        $labels = [];

        // Mengambil data dari 6 hari lalu sampai hari ini (total 7 hari)
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);

            // Hitung jumlah siswa yang mendaftar pada tanggal tersebut
            $count = PendaftaranSiswa::whereDate('created_at', $date->toDateString())->count();

            // Masukkan format tanggal ke label sumbu X (contoh: 09 Sep, 10 Sep)
            $labels[] = $date->translatedFormat('d M');
            $data[] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Siswa Mendaftar',
                    'data' => $data,
                    'fill' => 'start',
                    'borderColor' => '#10b981', // Warna garis (Hijau Emerald)
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)', // Warna bayangan transparan
                    'tension' => 0.3, // Membuat garis melengkung halus (smooth line)
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Grafik garis untuk tren harian
    }

protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'ticks' => [
                        'precision' => 0, // Mengatur jumlah desimal jadi 0 (bilangan bulat)
                        'stepSize' => 1,  // Memaksa kenaikan kelipatan 1 angka
                    ],
                ],
            ],
        ];
    }
}