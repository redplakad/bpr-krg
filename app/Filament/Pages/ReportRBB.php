<?php

namespace App\Filament\Pages;
use Carbon\Carbon; 

use App\Models\KantorCabang;

use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Http\Request;

class ReportRBB extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.report-r-b-b';

    protected static ?string $navigationGroup = 'Analisis Data';

    public static function getNavigationLabel(): string
    {
        return 'Laporan RBB'; // Ganti dengan title navigasi yang diinginkan
    }

    public function getTitle(): string | Htmlable
    {
        return __('Laporan RBB');
    }
    public static function getPluralLabel(): string
    {
        return __('Laporan RBB');
    }

    public $data = [];

    public function mount(Request $request): void {
        // Retrieve kantor cabang sorted by 'kode'
        $kantorCabang = KantorCabang::orderBy('kode', 'asc')->get();
    
        // Get year and month from the query parameters
        $year = $request->query('year');
        $month = $request->query('month');
    
        // Create a Carbon instance for the last day of the specified month and year
        $currentDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();
        
        // Create a Carbon instance for the last day of the same month in the previous year
        $lastYearDate = Carbon::createFromDate($year - 1, $month, 1)->endOfMonth();
    
        // Format dates to dd/mm/YYYY
        $TGLAktualTahunIni = $currentDate->format('d/m/Y');
        $TGLAktualTahunlalu = $lastYearDate->format('d/m/Y');
    
        // Prepare data for the view
        $this->data = [
            'url' => ReportRBB::getUrl(),
            'year' => $year,
            'month' => $month,
            'cabang' => $kantorCabang,
            'aktualTahunIni' => $TGLAktualTahunIni,
            'aktualTahunLalu' => $TGLAktualTahunlalu,
        ];
    }
}
