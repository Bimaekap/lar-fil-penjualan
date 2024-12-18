<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\AuthBuyerController;
use Illuminate\Support\Facades\Route;

Route::prefix('buyer')->middleware('guest:buyer')->group(function () {

    Route::get('/login', [AuthBuyerController::class, 'index'])->name('buyer.login');
    Route::get('/register', [AuthBuyerController::class, 'register'])->name('buyer.register');
    Route::post('/post-login', [AuthBuyerController::class, 'postlogin'])->name('login.post');
    Route::post('/post-register', [AuthBuyerController::class, 'postRegister'])->name('register.post');
});
Route::prefix('buyer')->middleware('auth:buyer')->group(function () {

    Route::get('/dashboard', function () {
        return view('index');
    })->name('buyer.dashboard');

    Route::post('/logout', [AuthBuyerController::class, 'logout'])->name('buyer.logout');
});
