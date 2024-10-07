<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\viewNominatifAo;
 
use App\Http\Controllers\SuratPanggilanController;
use App\Http\Controllers\DetailNominatifController;
use App\Http\Controllers\printLaporanRBB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/admin')->name('auth.login');
Route::get('/login', function () {
    return redirect(route('auth.login'));
})->name('login');

Route::get('/admin/surat-panggilan/{id}', [SuratPanggilanController::class, 'print'])
    ->name('filament.admin.surat-panggilan');

Route::get('/admin/print-rbb/{type}', [printLaporanRBB::class, 'print'])
    ->name('filament.admin.print.rbb');

Route::get('/admin/nominatif-ao/{slug}', [viewNominatifAo::class, 'index'])->name('NominatifAo');
//Route::get('/admin/detail-nominatif/{slug}', [DetailNominatifController::class, 'index'])->name('detailNominatif');