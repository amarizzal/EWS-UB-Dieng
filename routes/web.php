<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecordController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/input-data', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::group(['prefix' => 'record'], function () {
        Route::get('/', [RecordController::class, 'index'])->name('record.index');
        Route::post('/', [RecordController::class, 'store'])->name('record.store');
        Route::get('/{record}', [RecordController::class, 'show'])->name('record.show');
        Route::put('/{record}', [RecordController::class, 'update'])->name('record.update');
        Route::delete('/{record}', [RecordController::class, 'destroy'])->name('record.destroy');
    });

});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
