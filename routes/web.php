<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'showLoginForm']);

Route::post('/login', [AuthController::class, 'login'])->name('login');
