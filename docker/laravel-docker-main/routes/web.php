<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\{loginController,dashboardController};
use Illuminate\Support\Facades\URL;

$url = config('app.url');
URL::forceRootUrl($url);
Route::get('/', [loginController::class, 'login'])->name('login');

Route::get('/register', [loginController::class, 'register'])->name('register');
Route::post('/register', [loginController::class, 'registerTeacher'])->name('registerTeacher');   

Route::get('/login-teacher', [loginController::class, 'loginTeacher'])->name('login-teacher');
Route::post('/login-teacher', [loginController::class, 'loginTeacherPost'])->name('loginTeacherPost');

Route::get('/login-student', [loginController::class, 'loginStudent'])->name('login-student');

Route::get('/dashboard-teacher', [dashboardController::class, 'dashboardTeacher'])->name('dashboard-teacher');
Route::get('/dashboard-student', [dashboardController::class, 'dashboardStudent'])->name('dashboard-student');