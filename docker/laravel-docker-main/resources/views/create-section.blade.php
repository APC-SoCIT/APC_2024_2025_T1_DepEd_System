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
                <div class="container-fluid" id="register-student-container">
                    <div>
                        <center><h1 class="pt-3">Create Section</h1></center>
                    </div>
                    <hr>
                        <form id="register-student-form" action="{{route('createSection.post')}}" method="POST">
                        @csrf
                        <br>
                        <div id="container">
                            <div class="mb-12 col-sm">
                                <label class="form-label">Section Name</label> 
                                <input type="text" class="form-control" id="secname" name="secname" required>  
                            </div>
                            <div class="row">
                                <div class="mb-6 col-sm">
                                    <label class="form-label">Grade Level</label>
                                    <select class="form-control center-placeholder" id="grade" name="grade" required>
                                        <option value="" disabled selected>--</option>
                                        <option value="1">Grade 1</option>
                                        <option value="2">Grade 2</option>
                                        <option value="3">Grade 3</option>
                                        <option value="4">Grade 4</option>
                                        <option value="5">Grade 5</option>
                                        <option value="6">Grade 6</option>
                                        <!-- Add more options as needed -->
                                    </select>               
                                </div>
                                <div class="mb-6 col-sm">
                                    <label class="form-label">School Year</label>
                                    <input type="text" class="form-control" id="school_year" name="school_year" required placeholder="Format: 20XX-20XX *No Spaces*">
                                </div>
                            </div>
                        </div>
                        <center>
                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 512 512">
                                <style>svg{fill:#ffffff}</style>
                                <path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/>
                            </svg>
                            Create Section
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
</body>
<?php
 if(isset($_GET['error'])){
     echo '<script>window.onload = function() { section_creation_error(); }</script>';
 }
?>
@endsection
@push('script')
<script src="{{ secure_asset('js/dashboard.js')}}"></script>
<script src="{{ secure_asset('js/login.js')}}"></script>
@endpush
