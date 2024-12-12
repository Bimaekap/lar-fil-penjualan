<?php

use App\Http\Controllers\AuthBuyerController;
use App\Http\Controllers\DownloadPdfController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{record}/pdf', [DownloadPdfController::class, 'download'])->name('barang.pdf.download');

Route::get('/website', [PageController::class, 'website'])->name('website.frontend');
Route::get('/login', [AuthBuyerController::class, 'index'])->name('buyer.login');
Route::get('/register', [AuthBuyerController::class, 'register'])->name('buyer.registration');
Route::post('/post-login', [AuthBuyerController::class, 'postlogin'])->name('login.post');
Route::post('/post-register', [AuthBuyerController::class, 'postRegister'])->name('register.post');
