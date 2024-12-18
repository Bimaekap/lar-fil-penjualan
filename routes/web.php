<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DownloadPdfController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{record}/pdf', [DownloadPdfController::class, 'download'])->name('barang.pdf.download');
Route::get('/website', [PageController::class, 'website'])->name('website.frontend');


require __DIR__ . '/buyer-auth.php';
require __DIR__ . '/auth.php';
