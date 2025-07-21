<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

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
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('user.show');
        Route::put('/{user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    });

});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
