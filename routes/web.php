<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Buyer\Auth\RegisteredController;
use App\Http\Controllers\Buyer\Auth\LoginController;
use BaconQrCode\Renderer\Path\Path;

// Route::get('/', [UserResource::class, 'index']);
Route::redirect('/', '/admin/login')->name('login');
// return Route::redirect('/laravel/login', '/login')->name('login');
// 
// Route::prefix('buyer')->group(function () {
//     Route::get('login', [LoginController::class, 'login'])->name('login');
//     Route::get('register', [RegisteredController::class, 'register'])->name('register');
//     Route::post('post-login', [LoginController::class, 'postLogin'])->name('post.login');
//     Route::post('post-register', [RegisteredController::class, 'postRegister'])->name('post.register');
// });

// Route::middleware('auth:buyer')->group(function () {
//     Route::get('shop', [LoginController::class, 'shop'])->name('shop');
//     // Route::resource('buyers', BuyerController::class);
//     Route::post('logout', [LoginController::class, 'logout'])->name('post.logout');
// });



require __DIR__ . '/buyer-auth.php';
require __DIR__ . '/auth.php';
