<?php

use App\Http\Controllers\AuthBuyerController;
use App\Http\Controllers\DownloadPdfController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/buyer-auth.php';
Route::get('/', function () {
    return view('welcome');
});

Route::get('/{record}/pdf', [DownloadPdfController::class, 'download'])->name('barang.pdf.download');
Route::get('/website', [PageController::class, 'website'])->name('website.frontend');


require __DIR__ . '/auth.php';
