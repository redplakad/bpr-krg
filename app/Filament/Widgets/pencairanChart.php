<?php

namespace App\Filament\Widgets;

use App\Models\MisLoan;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class pencairanChart extends ChartWidget
{
    protected static ?string $heading = 'Pencairan Kredit';

    protected function getData(): array
    {
        $startDate = Carbon::now()->startOfYear(); // 1st Jan of current year
        $endDate = Carbon::now()->endOfYear(); // 31st Dec of current year
        
        $monthlyData = MisLoan::whereBetween('TGL_PK', [$startDate, $endDate])
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->TGL_PK)->format('F'); // Group by month name
            });
        
        $pencairanPerBulan = [];
        
        foreach ($monthlyData as $month => $data) {
            $pencairanPerBulan[$month] = $data->sum('pencairan'); // Assuming 'pencairan' is the column for the amount
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pencairan Kredit Tahuni Ini',
                    'data' => $pencairanPerBulan,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
