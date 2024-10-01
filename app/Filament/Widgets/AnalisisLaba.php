<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

use App\Models\NeracaHarian;
use App\Models\Setting;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class AnalisisLaba extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'analisisLaba';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'AnalisisLaba';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $datadate = Setting::where('name', 'DATADATE')->first();
        $cab = auth()->user()->branch_code;
        
        $currentYear = Carbon::createFromFormat('Ymd', $datadate->value)->year;

        // Array untuk menyimpan saldo akhir per bulan
        $saldoAkhirPerBulan = array_fill(0, 12, 0); // Inisialisasi array dengan 12 bulan
    
        // Iterasi melalui setiap bulan dalam tahun ini
        for ($month = 1; $month <= 12; $month++) {
            // Ambil saldo akhir untuk bulan tersebut menggunakan whereMonth
            $saldoAkhir = Cache::remember("monthly_balance_{$cab}_{$month}", 60 * 60, function () use ($cab, $currentYear, $month) {
                return NeracaHarian::where('CAB', $cab) // Pastikan ini adalah kolom yang relevan, sesuaikan jika perlu
                    ->whereYear('DATADATE', $currentYear) // Filter berdasarkan tahun saat ini
                    ->whereMonth('DATADATE', $month)
                    ->where('NOMOR_REKENING', 31001)      // Filter berdasarkan bulan saat ini
                    ->sum('saldo_akhir'); // Ambil total saldo akhir
            });
    
            // Simpan saldo akhir ke dalam array untuk bulan yang sesuai (bulan - 1 karena array dimulai dari 0)
            $saldoAkhirPerBulan[$month - 1] = $saldoAkhir;
        }
        $data = $saldoAkhirPerBulan;

        return [
            'chart' => [
                'type' => 'line',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'AnalisisLaba',
                    'data' => $data,
                ],
            ],
            'xaxis' => [
                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'colors' => ['#f59e0b'],
            'stroke' => [
                'curve' => 'smooth',
            ],
        ];
    }
}
