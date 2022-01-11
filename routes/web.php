<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\DashboardController;

require __DIR__.'/auth.php';

Route::get('/', HomeController::class)->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/qr-codes/create', [DashboardController::class, 'newQrCode'])->name('generate');
    Route::get('/qr-codes', [DashboardController::class, 'allQrCodes'])->name('qr-codes');
    Route::post('/qr-codes', [QrCodeController::class, 'store']);
});

