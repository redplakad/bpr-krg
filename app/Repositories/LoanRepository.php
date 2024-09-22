<?php

namespace App\Repositories;

use App\Models\MisLoan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class LoanRepository
{
    public function getTotalLoan(string $cab, string $datadate): float
    {
        return Cache::remember("total_loan_{$cab}_{$datadate}", 60 * 60, function () use ($cab, $datadate) {
            return MisLoan::where('DATADATE', $datadate)->where('CAB', $cab)->sum('POKOK_PINJAMAN');
        });
    }

    public function getDailyDisbursement(string $cab, string $datadate): array
    {
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
        $currentDay = Carbon::now()->day;

        // Membuat rentang tanggal untuk bulan ini (dari tanggal 1 sampai dengan hari ini)
        $startDate = Carbon::createFromFormat('Y-m-d', "{$currentYear}-{$currentMonth}-01");
        $endDate = Carbon::createFromFormat('Y-m-d', "{$currentYear}-{$currentMonth}-{$currentDay}");

        // Array untuk menyimpan data per hari
        $pencairanPerDay = [];

        // Iterasi melalui setiap hari dalam rentang tanggal
        for ($date = $startDate; $date->lessThanOrEqualTo($endDate); $date->addDay()) {
            // Format tanggal ke dalam format yang sesuai dengan TGL_PK
            $formattedDate = $date->format('Ymd');

            // Mengambil data untuk tanggal tertentu
            $pencairanPerDay[$formattedDate] = Cache::remember("daily_disbursement_{$cab}_{$formattedDate}", 60 * 60, function () use ($cab, $formattedDate, $datadate) {
                return MisLoan::where('CAB', $cab)
                    ->where('TGL_PK', $formattedDate)->sum('POKOK_PINJAMAN');
            });
        }

        return $pencairanPerDay;
    }

    public function getDailyBalance(string $cab): array
    {
        // Implementasi serupa dengan getDailyDisbursement()
        // Mengambil total baki per hari berdasarkan CAB
        // Kode yang sama dengan getDailyDisbursement tetapi dengan kondisi yang berbeda
    }

    public function getMonthlyDisbursement(): float
    {
        // Mengambil total pencairan bulanan
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        // Membuat rentang tanggal untuk bulan ini
        $startDate = Carbon::createFromFormat('Y-m-d', "{$currentYear}-{$currentMonth}-01")->format('Ymd');
        $endDate = Carbon::createFromFormat('Y-m-d', "{$currentYear}-{$currentMonth}-" . Carbon::now()->daysInMonth)->format('Ymd');

        return Cache::remember("monthly_disbursement_{$currentYear}_{$currentMonth}", 60 * 60, function () use ($startDate, $endDate) {
            return MisLoan::whereBetween('TGL_PK', [$startDate, $endDate])->sum('POKOK_PINJAMAN');
        });
    }

    public function getPencairanPerBulan(string $cab, string $datadate): array
    {
        $currentYear = Carbon::now()->year;
    
        // Array untuk menyimpan total pencairan per bulan
        $pencairanPerBulan = array_fill(0, 12, 0); // Inisialisasi array dengan 12 bulan
    
        // Iterasi melalui setiap bulan dalam tahun ini
        for ($month = 1; $month <= 12; $month++) {
            // Ambil total pencairan untuk bulan tersebut menggunakan whereMonth
            $totalPencairan = Cache::remember("monthly_disbursement_{$cab}_{$month}", 60 * 60, function () use ($cab, $currentYear, $month, $datadate) {
                return MisLoan::where('CAB', $cab)
                    ->where('DATADATE', $datadate)
                    ->whereYear('TGL_PK', $currentYear) // Filter by current year
                    ->whereMonth('TGL_PK', $month)      // Filter by current month
                    ->sum('POKOK_PINJAMAN');
            });
    
            // Simpan total pencairan ke dalam array untuk bulan yang sesuai (bulan - 1 karena array dimulai dari 0)
            $pencairanPerBulan[$month - 1] = $totalPencairan;
        }
    
        // Kembalikan hanya data pencairan per bulan
        return $pencairanPerBulan;
    }

    public function getPencairanPerTanggal(string $cab, string $datadate): array
    {
        // Validate the input date format
        try {
            $currentDate = Carbon::createFromFormat('Y-m-d', $datadate);
            if (!$currentDate) {
                throw new \Exception("Invalid date format for datadate: {$datadate}");
            }
        } catch (\Exception $e) {
            //Log::error("Date parsing error: " . $e->getMessage());
            return []; // Return an empty array or handle as needed
        }
    
        $currentYear = $currentDate->year;
        $currentMonth = $currentDate->month;
        $currentDay = $currentDate->day;
    
        // Create date range for the current month (from the 1st to the current day)
        $startDate = Carbon::createFromFormat('Y-m-d', "{$currentYear}-{$currentMonth}-01");
        $endDate = Carbon::createFromFormat('Y-m-d', "{$currentYear}-{$currentMonth}-{$currentDay}");
    
        // Array to store daily disbursement data
        $pencairanPerDay = [];
    
        // Iterate through each day in the date range
        for ($date = $startDate; $date->lessThanOrEqualTo($endDate); $date->addDay()) {
            // Format the date to match TGL_PK format
            $formattedDate = $date->format('Ymd');
    
            // Fetch total disbursement for that date
            $totalPencairan = Cache::remember("daily_disbursement_{$cab}_{$datadate}_{$formattedDate}", 60 * 60, function () use ($cab, $datadate, $formattedDate) {
                return MisLoan::where('CAB', $cab)
                    ->where('DATADATE', $datadate)
                    ->where('TGL_PK', $formattedDate)
                    ->sum('POKOK_PINJAMAN');
            });
    
            // Store total disbursement in the array for the corresponding date
            $pencairanPerDay[$formattedDate] = (int)$totalPencairan; // Cast to int if necessary
        }
    
        // Return daily disbursement data
        return $pencairanPerDay;
    }

    public function getNonPerformingLoans(string $cab, string $datadate): float
    {
        return Cache::remember("non_performing_loans_{$cab}_{$datadate}", 60 * 60, function () use ($cab, $datadate) {
            return MisLoan::where('CAB', $cab)->where('DATADATE', $datadate)->where('KODE_KOLEK', '>', 2)->sum('POKOK_PINJAMAN');
        });
    }
}