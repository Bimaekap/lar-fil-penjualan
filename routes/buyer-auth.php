<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Buyer\Auth\LoginController;
use App\Http\Controllers\Buyer\Auth\RegisteredController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;

// !Guest
Route::get('website', [GuestController::class, 'index'])->name('guest.index');
Route::prefix('buyer')->middleware(['guest:buyer'])->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('guest.login');
    Route::get('register', [RegisteredController::class, 'register'])->name('guest.register');
    Route::post('post-login', [LoginController::class, 'postLogin'])->name('post.login');
    Route::post('post-register', [RegisteredController::class, 'postRegister'])->name('post.register');
});

// !Auth
Route::prefix('buyer')->middleware('auth:buyer')->group(function () {
    Route::resource('buyers', BuyerController::class);
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::get('contact', [ContactController::class, 'contact'])->name('contact');
    Route::post('logout', [LoginController::class, 'logout'])->name('post.logout');
});
