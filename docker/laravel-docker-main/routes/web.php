<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\{loginController};

Route::get('/', [loginController::class, 'login'])->name('login');
Route::get('/register', [loginController::class, 'register'])->name('register');
Route::get('/login-teacher', [loginController::class, 'loginTeacher'])->name('login-teacher');
Route::get('/login-student', [loginController::class, 'loginStudent'])->name('login-student');