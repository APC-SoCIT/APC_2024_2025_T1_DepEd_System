<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\{loginController};

Route::get('/', [loginController::class, 'login'])->name('login');
