<?php

use App\Http\Controllers\AuthBuyerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::prefix('buyer')->middleware('guest:buyer')->group(function () {
    Route::get('/login', [AuthBuyerController::class, 'index'])->name('buyer.login');
    Route::get('/register', [AuthBuyerController::class, 'register'])->name('buyer.register');
    Route::post('/post-login', [AuthBuyerController::class, 'postlogin'])->name('login.post');
    Route::post('/post-register', [AuthBuyerController::class, 'postRegister'])->name('register.post');

    Route::get('/detail-produk', [ProductController::class, 'index'])->name('produk');
});

Route::prefix('buyer')->middleware('auth:buyer')->group(function () {

    Route::get('/dashboard', function () {
        return view('index');
    })->name('buyer.dashboard');

    // Product Controller
    Route::get('/detail-produk/{id}', [ProductController::class, 'index'])->name('produk');
    // -----------------
    Route::post('/logout', [AuthBuyerController::class, 'logout'])->name('buyer.logout');
});
