<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SuratPanggilanController;
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

Route::get('/', function () {
    return redirect(route('login'));
});
Route::get('/login', function () {
    return redirect(route('filament.auth.login'));
})->name('login');

Route::get('/admin/surat-panggilan/{id}', [SuratPanggilanController::class, 'print'])
    ->name('filament.admin.surat-panggilan');