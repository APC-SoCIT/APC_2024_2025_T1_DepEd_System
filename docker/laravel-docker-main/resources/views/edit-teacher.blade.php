@extends('layouts.dashboard-layout')

@section('content')
<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <center><a href="{{route('dashboard-teacher')}}" class="no-effects"><img id="logo" src="{{ secure_asset('DepEd_logo.ico') }}"></a>
                    <p><a href="{{route('dashboard-teacher')}}">DepEd Teacher Portal</a></p></center>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="{{route('dashboard-teacher')}}" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#student" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-graduation-cap"></i>
                            Manage Students
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
                            aria-expanded="false"><i class="fa-solid fa-chalkboard-user"></i>
                            Manage Section
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
        <div class="main">
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
                <div class="container-fluid" id="dashboard">
                    <form id="login" action="{{route('edit-teacher.post')}}" method="POST">
                        @csrf
                        <div id="container">
                            <div class="row">
                            <div class="mb-3 col-sm">
                                <label class="form-label">First Name</label> 
                                <input type="text" class="form-control" id="fname" name="fname" value="{{$teacher->fname}}" required>  
                        </div>
                            <div class="mb-3 col-sm">
                                <label class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="mname" name="mname" value="{{$teacher->mname}}" required>                
                            </div>
                            <div class="mb-3 col-sm">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" value="{{$teacher->lname}}" required>
                            </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="sid">School Name</label>
                                <select class="form-control center-placeholder" id="sid" name="sid" required>
                                    <option value="" disabled {{ !isset($teacher->sid) ? 'selected' : '' }}>--</option>
                                    <option value="1" {{ isset($teacher->sid) && $teacher->sid == 1 ? 'selected' : '' }}>Guadalupe Viejo Elementary School</option>
                                    <option value="2" {{ isset($teacher->sid) && $teacher->sid == 2 ? 'selected' : '' }}>Makati Elementary School</option>
                                    <option value="3" {{ isset($teacher->sid) && $teacher->sid == 3 ? 'selected' : '' }}>Heneral Pio Del Pilar Elementary School</option>
                                    <option value="4" {{ isset($teacher->sid) && $teacher->sid == 4 ? 'selected' : '' }}>La Paz Elementary School</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label">Teacher ID</label>
                                    <input type="text" class="form-control" id="tid" name="tid" value="{{$teacher->tid}}" readonly required>
                                </div>
                                <div class="mb-3 col-sm">
                                <label class="form-label" for="sex">Sex</label>
                                <select class="form-control center-placeholder" id="sex" name="sex" required>
                                    @if($teacher->sex === 'male')
                                        <option value="male" selected>Male</option>
                                        <option value="female">Female</option>
                                    @else
                                        <option value="male">Male</option>
                                        <option value="female" selected>Female</option> 
                                    @endif
                                </select>
                                </div>
                                <div class="mb-3 col-sm">
                                    <label class="form-label" for="bday">Birthday</label>
                                    <input type="date" class="form-control" id="bday" name="bday" value="{{$teacher->bday}}" required>
                                </div>
                            </div>
                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$teacher->email}}" required>
                        </div>
                            <div class="row">
                                <hr>
                                <h4 class="mb-3">Optional:</h4>
                                <div class="mb-3 col-sm">
                                    <label class="form-label">Old Password</label>
                                    <input type="password" class="form-control" id="old_password" name="old_password">
                                </div>
                                <div class="mb-3 col-sm">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password">
                                </div>
                                <div class="mb-3 col-sm">
                                    <label class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                                </div>
                            </div>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary mb-3">
                                Update
                            </button>
                        </center>
                    </form>
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
    <script src="{{ secure_asset('js/dashboard.js')}}"></script>
</body>
<?php
 if(isset($_GET['accountUpdateFailed'])){
     echo '<script>window.onload = function() { accountUpdateFailed(); }</script>';
 }
?>
@endsection
