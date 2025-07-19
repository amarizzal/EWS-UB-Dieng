<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', [AuthController::class, 'showLoginForm']);

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/input-data', [DashboardController::class, 'store'])->name('dashboard.store');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
