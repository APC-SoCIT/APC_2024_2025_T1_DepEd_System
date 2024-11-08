@extends('layouts.dashboard-layout')

@section('content')
<link href="{{secure_asset('css/grades.css')}}" rel="stylesheet">
<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <center>
                        <a href="{{route('dashboard-teacher')}}" class="no-effects">
                            <img id="logo" src="{{ secure_asset('DepEd_logo.ico') }}">
                        </a>
                        <p><a href="{{route('dashboard-teacher')}}">DepEd Teacher Portal</a></p>
                    </center>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="{{route('dashboard-teacher')}}" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#student" data-bs-toggle="collapse"
                            aria-expanded="false">
                            <i class="fa-solid fa-graduation-cap"></i> Manage Students
                        </a>
                        <ul id="student" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{route('register-student')}}" class="sidebar-link">Register Student</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('view-student')}}" class="sidebar-link">View Students</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#section" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-chalkboard-user"></i> Manage Section
                        </a>
                        <ul id="section" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{route('create-section')}}" class="sidebar-link">Create Section</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('view-section')}}" class="sidebar-link">View Sections</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('manage-grades')}}" class="sidebar-link">
                            <i class="fa-solid fa-medal"></i> Manage Grades
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="main"  id="card-row">
            <nav class="navbar navbar-expand px-3">
                <button style="color:white;" class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="flex-fill pe-md-0" id="user-link">
                                <h6 style="color:white!important;"><b>{{ ucfirst(auth()->user()->fname) }}</b></h6>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end mt-3">
                                <p><a href="{{route('edit-teacher')}}" class="dropdown-item"><i class="fa-solid fa-pen-to-square"></i> Edit Profile</a></p>
                                <p><a href="{{route('logout')}}" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content px-3 py-2">
                <div class="container-fluid" id="view-student" style='overflow:auto;'>
                    <br>
                    <div class="row info-container align-items-center">
                        <div class="col-auto info-item">
                                <b>LRN:</b> {{$student->lrn}}
                            </div>
                            <div class="col-auto info-item">
                                <b>NAME:</b> {{$student->fname}} {{$student->mname}} {{$student->lname}}
                            </div>
                            <div class="col-auto file-input-container">
                            
                            </div>
                        <div class="col-auto file-input-container mt-2" style='padding-right=0px!important;'>
                                <a style='font-size:15px!important;'href="{{route('view-section-grade', ['id' => $student->section]  )}}" class="custom-file-upload btn btn-primary">
                                    <i class="fa fa-arrow-left"></i> Back
                                </a>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <table class="table" id="record-student-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Learning Areas</th>
                                        <th scope="col"><center>Q1</center></th>
                                        <th scope="col"><center>Q2</center></th>
                                        <th scope="col"><center>Q3</center></th>
                                        <th scope="col"><center>Q4</center></th>
                                        <th scope="col"><center>Final Grade</center></th>
                                        <th scope="col"><center>Remarks</center></th>
                                    </tr>
                                </thead>
                                <form action="{{route('saveGrades.post',['id' => $student->id])}}" method="POST">
                                    @csrf
                                    <tbody>
                                        <tr class="grades-row">
                                            <td>Mother Tongue</td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="mt_q1" name="mt_q1" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][0][0] : ($records->firstWhere('quarter', 1)->mt ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="mt_q2" name="mt_q2" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][0][1] : ($records->firstWhere('quarter', 2)->mt ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="mt_q3" name="mt_q3" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][0][2] : ($records->firstWhere('quarter', 3)->mt ?? '') }}">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="mt_q4" name="mt_q4" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][0][3] : ($records->firstWhere('quarter', 4)->mt ?? '') }}">
                                                </center>
                                            </td>
                                            <td><center><span class="average"></span></center><input type="hidden" name="mt_average" class="average" value=""></td>
                                            <td><center><span class="remarks"></span></center><input type="hidden" name="mt_remarks" class="remarks" value=""></td>
                                        </tr>
                                        <tr class="grades-row">
                                            <td>Filipino</td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="filipino_q1" name="filipino_q1" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][1][0] : ($records->firstWhere('quarter', 1)->filipino ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="filipino_q2" name="filipino_q2" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][1][1] : ($records->firstWhere('quarter', 2)->filipino ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="filipino_q3" name="filipino_q3" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][1][2] : ($records->firstWhere('quarter', 3)->filipino ?? '') }}">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="filipino_q4" name="filipino_q4" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][1][3] : ($records->firstWhere('quarter', 4)->filipino ?? '') }}">
                                                </center>
                                            </td>
                                            <td><center><span class="average"></span></center><input type="hidden" name="filipino_average" class="average" value=""></td>
                                            <td><center><span class="remarks"></span></center><input type="hidden" name="filipino_remarks" class="remarks" value=""></td>
                                        </tr>
                                        <tr class="grades-row">
                                            <td>English</td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="english_q1" name="english_q1" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][2][0] : ($records->firstWhere('quarter', 1)->english ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="english_q2" name="english_q2" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][2][1] : ($records->firstWhere('quarter', 2)->english ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="english_q3" name="english_q3" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][2][2] : ($records->firstWhere('quarter', 3)->english ?? '') }}">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="english_q4" name="english_q4" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][2][3] : ($records->firstWhere('quarter', 4)->english ?? '') }}">
                                                </center>
                                            </td>
                                            <td><center><span class="average"></span></center><input type="hidden" name="english_average" class="average" value=""></td>
                                            <td><center><span class="remarks"></span></center><input type="hidden" name="english_remarks" class="remarks" value=""></td>
                                        </tr>
                                        <tr class="grades-row">
                                            <td>Math</td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="math_q1" name="math_q1" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][3][0] : ($records->firstWhere('quarter', 1)->math ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="math_q2" name="math_q2" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][3][1] : ($records->firstWhere('quarter', 2)->math ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="math_q3" name="math_q3" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][3][2] : ($records->firstWhere('quarter', 3)->math ?? '') }}">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="math_q4" name="math_q4" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][3][3] : ($records->firstWhere('quarter', 4)->math ?? '') }}">
                                                </center>
                                            </td>
                                            <td><center><span class="average"></span></center><input type="hidden" name="math_average" class="average" value=""></td>
                                            <td><center><span class="remarks"></span></center><input type="hidden" name="math_remarks" class="remarks" value=""></td>
                                        </tr>
                                        <tr class="grades-row">
                                            <td>Araling Panlipunan</td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="ap_q1" name="ap_q1" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][4][0] : ($records->firstWhere('quarter', 1)->ap ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="ap_q2" name="ap_q2" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][4][1] : ($records->firstWhere('quarter', 2)->ap ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="ap_q3" name="ap_q3" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][4][2] : ($records->firstWhere('quarter', 3)->ap ?? '') }}">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="ap_q4" name="ap_q4" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][4][3] : ($records->firstWhere('quarter', 4)->ap ?? '') }}">
                                                </center>
                                            </td>
                                            <td><center><span class="average"></span></center><input type="hidden" name="ap_average" class="average" value=""></td>
                                            <td><center><span class="remarks"></span></center><input type="hidden" name="ap_remarks" class="remarks" value=""></td>
                                        </tr>
                                        <tr class="grades-row">
                                            <td>Edukasyon sa Pagpapakatao</td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="esp_q1" name="esp_q1" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][5][0] : ($records->firstWhere('quarter', 1)->esp ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="esp_q2" name="esp_q2" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][5][1] : ($records->firstWhere('quarter', 2)->esp ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="esp_q3" name="esp_q3" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][5][2] : ($records->firstWhere('quarter', 3)->esp ?? '') }}">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="esp_q4" name="esp_q4" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][5][3] : ($records->firstWhere('quarter', 4)->esp ?? '') }}">
                                                </center>
                                            </td>
                                            <td><center><span class="average"></span></center><input type="hidden" name="esp_average" class="average" value=""></td>
                                            <td><center><span class="remarks"></span></center><input type="hidden" name="esp_remarks" class="remarks" value=""></td>
                                        </tr>
                                        <tr class="grades-row">
                                            <td>MAPEH</td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="mapeh_q1" name="mapeh_q1" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][6][0] : ($records->firstWhere('quarter', 1)->mapeh ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="mapeh_q2" name="mapeh_q2" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][6][1] : ($records->firstWhere('quarter', 2)->mapeh ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="mapeh_q3" name="mapeh_q3" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][6][2] : ($records->firstWhere('quarter', 3)->mapeh ?? '') }}">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="mapeh_q4" name="mapeh_q4" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][6][3] : ($records->firstWhere('quarter', 4)->mapeh ?? '') }}">
                                                </center>
                                            </td>
                                            <td><center><span class="average"></span></center><input type="hidden" name="mapeh_average" class="average" value=""></td>
                                            <td><center><span class="remarks"></span></center><input type="hidden" name="mapeh_remarks" class="remarks" value=""></td>
                                        </tr>
                                        <tr class="grades-row">
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Music</td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="music_q1" name="music_q1" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][7][0] : ($records->firstWhere('quarter', 1)->music ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="music_q2" name="music_q2" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][7][1] : ($records->firstWhere('quarter', 2)->music ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="music_q3" name="music_q3" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][7][2] : ($records->firstWhere('quarter', 3)->music ?? '') }}">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="music_q4" name="music_q4" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][7][3] : ($records->firstWhere('quarter', 4)->music ?? '') }}">
                                                </center>
                                            </td>
                                            <td><center></center></td>
                                            <td></td>
                                        </tr>
                                        <tr class="grades-row">
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Arts</td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="arts_q1" name="arts_q1" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][8][0] : ($records->firstWhere('quarter', 1)->arts ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="arts_q2" name="arts_q2" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][8][1] : ($records->firstWhere('quarter', 2)->arts ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="arts_q3" name="arts_q3" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][8][2] : ($records->firstWhere('quarter', 3)->arts ?? '') }}">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="arts_q4" name="arts_q4" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][8][3] : ($records->firstWhere('quarter', 4)->arts ?? '') }}">
                                                </center>
                                            </td>
                                            <td><center></center></td>
                                            <td><center></center></td>
                                        </tr>
                                        <tr class="grades-row">
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Physical Education</td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="pe_q1" name="pe_q1" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][9][0] : ($records->firstWhere('quarter', 1)->pe ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="pe_q2" name="pe_q2" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][9][1] : ($records->firstWhere('quarter', 2)->pe ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="pe_q3" name="pe_q3" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][9][2] : ($records->firstWhere('quarter', 3)->pe ?? '') }}">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="pe_q4" name="pe_q4" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][9][3] : ($records->firstWhere('quarter', 4)->pe ?? '') }}">
                                                </center>
                                            </td>
                                            <td><center></center></td>
                                            <td></td>
                                        </tr>
                                        <tr class="grades-row">
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Health</td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="health_q1" name="health_q1" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][10][0] : ($records->firstWhere('quarter', 1)->health ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="health_q2" name="health_q2" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][10][1] : ($records->firstWhere('quarter', 2)->health ?? '') }}">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="health_q3" name="health_q3" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][10][2] : ($records->firstWhere('quarter', 3)->health ?? '') }}">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input readonly type="number" class="form-control-grades input-sm" id="health_q4" name="health_q4" min="1" max="100" value="{{ session('analysis') && is_array(session('analysis')['text']) ? session('analysis')['text'][10][3] : ($records->firstWhere('quarter', 4)->health ?? '') }}">
                                                </center>
                                            </td>
                                            <td><center></center></td>
                                            <td></td>
                                        </tr>
                                        <tr class="grades-row">
                                            <td colspan="5"></td>
                                            <td colspan="2">General Average: <b><span class="general_average"></b></span><input type="hidden" name="general_average" class="general_average" value=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                    </div>                    
                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="">
                                    <strong>DepEd Teacher Portal</strong>
                                </a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="https://www.deped.gov.ph/" style="color:white;">DepEd Philippines</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
@push('script')
<script src="{{ secure_asset('js/dashboard.js')}}"></script>
<script src="{{ secure_asset('js/login.js')}}"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById('formFileSm');
    const uploadForm = document.getElementById('file-upload-form');

    // Check if the file input and form exist before adding the event listener
    if (fileInput && uploadForm) {
        fileInput.addEventListener('change', function() {
            uploadForm.submit();
        });
    }

    // Process each grades row for input changes
    document.querySelectorAll(".grades-row").forEach(row => {
        const inputs = row.querySelectorAll(".quarter");
        const averageDisplay = row.querySelector(".average");

        inputs.forEach(input => {
            input.addEventListener("input", () => {
                calculateRowAverage(row);
                calculateGeneralAverage(); // Calculate general average whenever a row's average changes
            });
        });
    });

    const rows = document.querySelectorAll(".grades-row");
    rows.forEach(row => {
        const inputs = row.querySelectorAll("input[type='number']");
        const averageDisplay = row.querySelector(".average");
        const remarksDisplay = row.querySelector(".remarks");

        // Validate input in real-time
        inputs.forEach(input => {
            input.addEventListener("input", () => {
                if (!validateInput(input)) {
                    input.value = ''; // Clear invalid input
                }
                calculateRowAverage(row); // Recalculate average regardless
                calculateGeneralAverage(); // Calculate general average whenever a row's average changes
            });
        });

        // Call the function to calculate the average immediately after loading the values
        calculateRowAverage(row);
        calculateGeneralAverage(); // Initial calculation of general average
    });
});

// Validation function to check if input is within range
function validateInput(input) {
    const value = parseFloat(input.value);
    return value >= 1 && value <= 100; // Returns true if valid, false otherwise
}

function calculateRowAverage(row) {
    const inputs = row.querySelectorAll("input[type='number']");
    const averageDisplay = row.querySelector(".average");
    const remarksDisplay = row.querySelector(".remarks");
    const averageInput = row.querySelector("input[name*='_average']"); // Match hidden inputs for average
    const remarksInput = row.querySelector("input[name*='_remarks']"); // Match hidden inputs for remarks

    // Convert input values to numbers and filter out NaN values
    const values = Array.from(inputs).map(input => parseFloat(input.value) || 0);
    const filledValues = values.filter(val => !isNaN(val) && val !== 0);

    // Check if we have exactly four filled values
    if (filledValues.length === 4) {
        const average = filledValues.reduce((a, b) => a + b, 0) / filledValues.length;

        // Round the average to the nearest whole number
        const roundedAverage = Math.round(average);
        averageDisplay.innerText = roundedAverage; // Display the rounded average

        // Update remarks based on the average
        const remarks = roundedAverage >= 75 ? 'Passed' : 'Failed';
        remarksDisplay.innerText = remarks; // Display remarks

        // Set the values for hidden inputs
        averageInput.value = roundedAverage; // Set the average hidden input
        remarksInput.value = remarks; // Set the remarks hidden input
    } else {
        averageDisplay.innerText = ''; // Clear average if not all fields are filled
        remarksDisplay.innerText = ''; // Clear remarks

        // Clear the hidden inputs as well
        averageInput.value = '';
        remarksInput.value = '';
    }
    
    calculateGeneralAverage(); // Recalculate general average after each row's average
}

function calculateGeneralAverage() {
    const averageElements = document.querySelectorAll('.grades-row .average');
    let totalAverage = 0;
    let count = 0;

    averageElements.forEach(avgElement => {
        const averageValue = parseFloat(avgElement.innerText);
        if (!isNaN(averageValue)) {
            totalAverage += averageValue;
            count++;
        }
    });

    // Calculate the general average
    const generalAverage = count > 0 ? totalAverage / count : null; // Set to null if no valid averages
    const roundedGeneralAverage = generalAverage !== null ? Math.round(generalAverage) : ''; // Keep it blank if null

    // Update the display
    const generalAverageSpan = document.querySelector('.general_average');
    const generalAverageInput = document.querySelector('input[name="general_average"]');

    generalAverageSpan.innerText = roundedGeneralAverage; // Update span with rounded average or blank
    generalAverageInput.value = roundedGeneralAverage; // Update hidden input with rounded average or blank
}
</script>

<!-- Search and Sort Script -->
@endpush
