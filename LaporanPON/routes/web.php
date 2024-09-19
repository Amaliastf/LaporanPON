<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Route untuk menyimpan laporan
Route::post('/save-report', [ReportController::class, 'store'])->name('report.store');

// Route untuk melihat laporan
Route::get('/reports', [ReportController::class, 'index'])->middleware('auth')->name('reports.index');

// Route untuk autentikasi (login, register, dll.)
Auth::routes();

// Route untuk halaman home setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route untuk dashboard laporan dengan middleware 'auth'
Route::get('/dashboard', [ReportController::class, 'index'])->middleware('auth')->name('dashboard');

// Route untuk logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');  // Redirect ke halaman login setelah logout
})->name('logout');