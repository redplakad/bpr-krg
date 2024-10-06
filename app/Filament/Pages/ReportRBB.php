<?php

namespace App\Filament\Pages;
use Carbon\Carbon; 

use App\Repositories\LaporanRBB\AssetRepository;

use App\Models\KantorCabang;
use App\Models\NeracaHarian;
use App\Models\RencanaBisnis;

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

    public function mount(Request $request, AssetRepository $assetRepo): void {
        // Retrieve kantor cabang sorted by 'kode'
        $kantorCabang = KantorCabang::orderBy('kode', 'asc')->get();
    
        // Get year and month from the query parameters
        $year = $request->query('year') ?? now()->year; // Mengambil tahun saat ini jika tidak ada
        $month = $request->query('month') ?? now()->month; // Mengambil bulan saat ini jika tidak ada
    
        // Create a Carbon instance for the last day of the specified month and year
        $currentDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();
    
        // Create a Carbon instance for the last day of the same month in the previous year
        $lastYearDate = Carbon::createFromDate($year - 1, $month, 1)->endOfMonth();
        
        // Get the latest date for the current year and month
        $latestDate = NeracaHarian::whereYear('DATADATE', date('Y', strtotime($currentDate)))
                                  ->whereMonth('DATADATE', date('m', strtotime($currentDate)))
                                  ->max('DATADATE');
    
        // Format dates to dd/mm/YYYY
        $TGLAktualTahunIni = $currentDate->format('d/m/Y');
        $TGLAktualTahunlalu = $lastYearDate->format('d/m/Y');
    
        // Initialize asset array
        $assets = $assetRepo->getAssets($kantorCabang, $latestDate, $lastYearDate, $currentDate, 10000, 'Aset');
        
        $kredits = $assetRepo->getAssets($kantorCabang, $latestDate, $lastYearDate, $currentDate, 14000, 'Kredit');
        
        $tabungans = $assetRepo->getAssets($kantorCabang, $latestDate, $lastYearDate, $currentDate, 22100, 'Tabunga');
        
        $depositos = $assetRepo->getAssets($kantorCabang, $latestDate, $lastYearDate, $currentDate, 22200, 'Deposito');
        
        $labas = $assetRepo->getAssets($kantorCabang, $latestDate, $lastYearDate, $currentDate, 31002, 'Laba');
    
        // Prepare data for the view
        $this->data = [
            'url' => ReportRBB::getUrl(),
            'year' => $year,
            'month' => $month,
            'cabang' => $kantorCabang,
            'aktualTahunIni' => $TGLAktualTahunIni,
            'aktualTahunLalu' => $TGLAktualTahunlalu,
            'assets' => $assets, // Use plural to indicate multiple entries
            'kredits' => $kredits,
            'tabungans' => $tabungans,
            'depositos' => $depositos,
            'labas' => $labas
        ];
    }
}
