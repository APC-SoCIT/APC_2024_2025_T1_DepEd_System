@extends('layouts.dashboard-layout')

@section('content')
<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <center><a href="{{route('dashboard-student')}}" class="no-effects"><img id="logo" src="{{ asset('DepEd_logo.ico') }}"></a>
                    <p><a href="#">DepEd Student Portal</a></p></center>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="{{route('dashboard-student')}}" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('view-student-sections')}}" class="sidebar-link">
                            <i class="fa-solid fa-medal pe-2"></i>
                            View Grades
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
                                <p><a href="{{route('edit-student')}}" class="dropdown-item"><i class="fa-solid fa-pen-to-square"></i> Change Password</a></p>
                                <p><a href="{{route('logout')}}" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <style>
                .text-justify {
                text-align: justify;
            }
            </style>
            <main class="content px-3 py-2">
                <div class="container-fluid" id="dashboard">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-sm-4">
                            <img class="mt-2 img-fluid rounded shadow" style="max-height: 535px; object-fit: cover;" src="https://www.teacherph.com/wp-content/uploads/2019/02/DepEd-Public-Schools-of-the-Future.jpg" alt="DepEd Public Schools">
                        </div>
                        <div class="col-sm-8 mt-2 mr-5">
                            <h3 class="mb-2">Greetings, {{ ucfirst(auth()->user()->fname) }} {{ ucfirst(auth()->user()->lname) }}!</h3>
                            <hr class="my-2">
                            <p class="lead text-justify">
                                The DepEd Student Portal is a simple and user-friendly web application designed to help students access and review their academic grades. You can easily view your grade history, organized by quarters and subjects in a clean and accessible interface. The application focuses on providing a straightforward experience, allowing you to quickly check and reflect on your academic performance at any time
                            </p>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="">
                                    <strong>DepEd Student Portal</strong>
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
    <script src="{{ asset('js/dashboard.js')}}"></script>
</body>
<?php
 if(isset($_GET['accountUpdated'])){
     echo '<script>window.onload = function() { accountUpdated(); }</script>';
 }
?>
@endsection
