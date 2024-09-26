<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\{loginController,dashboardController};

Route::get('/', [loginController::class, 'login'])->name('login')->middleware('user');
Route::get('/login', [loginController::class, 'login'])->name('login')->middleware('user');

Route::get('/register', [loginController::class, 'register'])->name('register')->middleware('user');
Route::post('/register', [loginController::class, 'registerTeacherPost'])->name('registerTeacher.post');
#Route::post('/register', [loginController::class, 'registerStudentPost'])->name('registerStudent.post');    
Route::get('/login-teacher', [loginController::class, 'loginTeacher'])->name('login-teacher')->middleware('user');
Route::post('/login', [loginController::class, 'loginTeacherPost'])->name('loginTeacher.post');
Route::get('/login-student', [loginController::class, 'loginStudent'])->name('login-student')->middleware('user');
#Route::post('/login', [loginController::class, 'loginStudentPost'])->name('loginStudent.post');

Route::get('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/dashboard-teacher', [dashboardController::class, 'dashboardTeacher'])->name('dashboard-teacher')->middleware('notTeacher');
Route::get('/dashboard-student', [dashboardController::class, 'dashboardStudent'])->name('dashboard-student')->middleware('notStudent');