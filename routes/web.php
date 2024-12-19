<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DownloadPdfController;
use App\Http\Controllers\QrcodeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{record}/pdf', [DownloadPdfController::class, 'download'])->name('barang.pdf.download');
Route::get('/website', [PageController::class, 'website'])->name('website.frontend');
Route::get('/qrcode', [QrcodeController::class, 'index'])->name('qrcode');
Route::get('/about', function () {
    return view('about');
})->name('scanqr');
require __DIR__ . '/buyer-auth.php';
require __DIR__ . '/auth.php';
