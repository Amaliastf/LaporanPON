<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::post('/save-report', [ReportController::class, 'store']);

