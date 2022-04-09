<?php

use App\Http\Controllers\Driver\AuthController as DriverAuthController;
use App\Http\Controllers\Driver\OrderController as DriverOrderController;
use App\Http\Controllers\Driver\ProfileController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\DriverController;
use App\Http\Controllers\User\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('user')->name('user.')->group(function() {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::middleware('auth.user')->group(function() {
        Route::get('profile', [AuthController::class, 'profile'])->name('profile');
        Route::get('list-driver', [DriverController::class, 'index'])->name('list-driver');
        Route::resource('order', OrderController::class)->only('store');
    });
});

Route::prefix('driver')->name('driver.')->group(function() {
    Route::post('login', [DriverAuthController::class, 'login'])->name('login');
    Route::middleware('auth.driver')->group(function() {
        Route::put('/profile/update-profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('profile',[ProfileController::class, 'index'])->name('profile');
        Route::resource('order', DriverOrderController::class)->only('index');
    });
});

