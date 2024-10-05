<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\{loginController,dashboardController};

Route::get('/', [loginController::class, 'login'])->name('login')->middleware('user');
Route::get('/login', [loginController::class, 'login'])->name('login')->middleware('user');

Route::get('/register', [loginController::class, 'register'])->name('register')->middleware('user');
Route::post('/register', [loginController::class, 'registerTeacherPost'])->name('registerTeacher.post');  
Route::get('/login-teacher', [loginController::class, 'loginTeacher'])->name('login-teacher')->middleware('user');
Route::post('/login-teacher', [loginController::class, 'loginTeacherPost'])->name('loginTeacher.post');
Route::get('/login-student', [loginController::class, 'loginStudent'])->name('login-student')->middleware('user');
Route::post('/login-student', [loginController::class, 'loginStudentPost'])->name('loginStudent.post');

Route::get('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/dashboard-teacher', [dashboardController::class, 'dashboardTeacher'])->name('dashboard-teacher')->middleware('notTeacher');
//Manage Student routing
Route::get('/register-student', [dashboardController::class, 'registerStudent'])->name('register-student')->middleware('notTeacher');
Route::post('/register-student', [dashboardController::class, 'registerStudentPost'])->name('registerStudent.post')->middleware('notTeacher');
Route::get('/view-student', [dashboardController::class, 'viewStudent'])->name('view-student')->middleware('notTeacher');
Route::get('/update-student/{id}', [dashboardController::class, 'updateStudent'])->name('update-student')->middleware('notTeacher');
Route::put('/update-student/{id}', [dashboardController::class, 'updateStudentPost'])->name('updateStudent.post')->middleware('notTeacher');
Route::delete('/view-student/{student}/studentDelete', [dashboardController::class, 'studentDelete'])->name('studentDelete')->middleware('notTeacher');
//Manage Section routing
Route::get('/create-section', [dashboardController::class, 'createSection'])->name('create-section')->middleware('notTeacher');
Route::post('/create-section', [dashboardController::class, 'createSectionPost'])->name('createSection.post')->middleware('notTeacher');
Route::get('/view-section', [dashboardController::class, 'viewSection'])->name('view-section')->middleware('notTeacher');
Route::get('/update-section/{id}', [dashboardController::class, 'updateSection'])->name('update-section')->middleware('notTeacher');
Route::post('/update-section/{id}', [dashboardController::class, 'updateSectionPost'])->name('updateSection.post')->middleware('notTeacher');
Route::delete('/update-section/{section}/sectionDelete', [dashboardController::class, 'sectionDelete'])->name('sectionDelete')->middleware('notTeacher');



Route::get('/dashboard-student', [dashboardController::class, 'dashboardStudent'])->name('dashboard-student')->middleware('notStudent');