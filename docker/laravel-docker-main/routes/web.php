<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\{loginController,dashboardController,gradeAnalyzer};
//$url = config('app.url');
//URL::forceRootUrl($url);
Route::get('/', [loginController::class, 'login'])->name('default-login')->middleware('user');
Route::get('/login', [loginController::class, 'login'])->name('login')->middleware('user');

Route::get('/register', [loginController::class, 'register'])->name('register')->middleware('user');
Route::post('/register', [loginController::class, 'registerTeacherPost'])->name('registerTeacher.post');  
Route::get('/login-teacher', [loginController::class, 'loginTeacher'])->name('login-teacher')->middleware('user');
Route::post('/login-teacher', [loginController::class, 'loginTeacherPost'])->name('loginTeacher.post');
Route::get('/login-student', [loginController::class, 'loginStudent'])->name('login-student')->middleware('user');
Route::post('/login-student', [loginController::class, 'loginStudentPost'])->name('loginStudent.post');

Route::get('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/dashboard-teacher', [dashboardController::class, 'dashboardTeacher'])->name('dashboard-teacher')->middleware('notTeacher');
Route::get('/edit-teacher', [dashboardController::class, 'editTeacher'])->name('edit-teacher')->middleware('notTeacher');
Route::post('/edit-teacher', [dashboardController::class, 'editTeacherPost'])->name('edit-teacher.post')->middleware('notTeacher');

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
Route::post('/update-section/{section}/sectionArchive', [dashboardController::class, 'sectionArchive'])->name('sectionArchive')->middleware('notTeacher');
Route::get('/assign-student/{id}', [dashboardController::class, 'assignStudent'])->name('assign-student')->middleware('notTeacher');
Route::post('/assign-student/{id}/assign', [dashboardController::class, 'assignStudentPost'])->name('assignStudent.post')->middleware('notTeacher');
Route::post('/assign-student/{id}/remove', [dashboardController::class, 'removeStudentPost'])->name('removeStudent.post')->middleware('notTeacher');
//Manage Record routing
Route::get('/manage-grades', [dashboardController::class, 'manageGrades'])->name('manage-grades')->middleware('notTeacher');
Route::get('/view-section-grade/{id}', [dashboardController::class, 'viewSectionGrade'])->name('view-section-grade')->middleware('notTeacher');
Route::get('/view-grades/{id}', [dashboardController::class, 'viewGrades'])->name('view-grades')->middleware('notTeacher');
Route::get('/view-section-archived-grade/{id}', [dashboardController::class, 'viewSectionArchivedGrade'])->name('view-section-archived-grade')->middleware('notTeacher');
Route::get('/view-archived-grades/{id}/{section}', [dashboardController::class, 'viewArchivedGrades'])->name('view-archived-grades')->middleware('notTeacher');
//Upload
Route::post('/upload-grades-gemini', [gradeAnalyzer::class, 'uploadGradesGemini'])->name('upload.grades.gemini')->middleware('notTeacher');
Route::post('/upload-grades-save/{id}', [dashboardController::class, 'saveGradesPost'])->name('saveGrades.post')->middleware('notTeacher');

//Student Portal
Route::get('/dashboard-student', [dashboardController::class, 'dashboardStudent'])->name('dashboard-student')->middleware('notStudent');
Route::get('/view-student-sections', [dashboardController::class, 'viewStudentSections'])->name('view-student-sections')->middleware('notStudent');
Route::get('/view-student-grade/{id}', [dashboardController::class, 'viewStudentGrade'])->name('view-student-grade')->middleware('notStudent');
Route::get('/edit-student', [dashboardController::class, 'editStudent'])->name('edit-student')->middleware('notStudent');
Route::post('/edit-student', [dashboardController::class, 'editStudentPost'])->name('edit-student.post')->middleware('notStudent');

//Admin Portal
Route::get('/admin-login', [loginController::class, 'adminLogin'])->name('admin-login')->middleware('user');
Route::post('/admin-login', [loginController::class, 'adminLoginPost'])->name('adminLogin.post');
                                                                                                    //Was not able to aliases since it was not being detected after registering it to the kernel
Route::get('/dashboard-admin', [dashboardController::class, 'dashboardAdmin'])->name('dashboard-admin')->middleware(\App\Http\Middleware\NotDepEdAdmin::class);
Route::get('/manage-schools', [dashboardController::class, 'manageSchools'])->name('manage-schools')->middleware(\App\Http\Middleware\NotDepEdAdmin::class);
Route::get('/add-school', [dashboardController::class, 'addSchool'])->name('add-school')->middleware(\App\Http\Middleware\NotDepEdAdmin::class);
Route::post('/add-school', [dashboardController::class, 'addSchoolPost'])->name('add-school.post')->middleware(\App\Http\Middleware\NotDepEdAdmin::class);
Route::get('/update-school/{id}', [dashboardController::class, 'updateSchool'])->name('update-school')->middleware(\App\Http\Middleware\NotDepEdAdmin::class);
Route::post('/update-school/{id}', [dashboardController::class, 'updateSchoolPost'])->name('update-school.post')->middleware(\App\Http\Middleware\NotDepEdAdmin::class);
Route::delete('/schoolDelete/{id}', [dashboardController::class, 'schoolDelete'])->name('schoolDelete')->middleware(\App\Http\Middleware\NotDepEdAdmin::class);

//Charts
Route::get('/dashboard-pass-and-failed', [dashboardController::class, 'dashboardPassAndFailed'])->name('dashboard-pass-and-failed')->middleware('notTeacher');
Route::get('/dashboard-grades-difference', [dashboardController::class, 'dashboardGradesDifference'])->name('dashboard-grades-difference')->middleware('notTeacher');
Route::get('/dashboard-grades-average', [dashboardController::class, 'dashboardGradesAverage'])->name('dashboard-grades-average')->middleware('notTeacher');
Route::get('/dashboard-section-count', [dashboardController::class, 'dashboardSectionCount'])->name('dashboard-section-count')->middleware('notTeacher');
Route::get('/dashboard-section-passing', [dashboardController::class, 'dashboardSectionPassing'])->name('dashboard-section-passing')->middleware('notTeacher');