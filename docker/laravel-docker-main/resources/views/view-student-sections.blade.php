@extends('layouts.dashboard-layout')

@section('content')
<body>
    <div class="wrapper">
    <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <center><a href="{{route('dashboard-student')}}" class="no-effects"><img id="logo" src="{{ secure_asset('DepEd_logo.ico') }}"></a>
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
                        <a href="{{route('dashboard-student')}}" class="sidebar-link">
                            <i class="fa-solid fa-medal"></i>
                            View Grades
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
                            <p><a href="{{route('edit-student')}}" class="dropdown-item"><i class="fa-solid fa-pen-to-square"></i> Change Password</a></p>
                            <p><a href="{{route('logout')}}" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content px-3 py-2">
                <div class="container-fluid" id="view-student">
                    <div>
                        <h1 class="pt-3">My Section</h1>
                    </div>
                    <hr>
                    <!-- Search Bar -->
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" id="search-bar-active" class="form-control" placeholder="Search by name, grade level, or school year">
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 g-4" id="active-sections">
                        @foreach($sections as $section)
                            <div class="col">
                                <div class=" section-card card">
                                    <div class="card-body">
                                        <h5 class="card-title">Name: {{$section->secname}}</h5>
                                    </div>                                        <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Grade level: {{$section->grade}}</li>
                                        <li class="list-group-item">SY: {{$section->school_year}}</li>
                                    </ul>
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <a href="{{ route('view-student-grade', ['id' => $section->id])}}"><button type="button" class="btn btn-primary btn-sm" id="section-edit-btn">View Grades</button></a>
                                    </div>
                                </div>     
                            </div>
                        @endforeach
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
<?php
 if(isset($_GET['error'])){
     echo '<script>window.onload = function() { section_update_error(); }</script>';
 }
 if(isset($_GET['updated'])){
     echo '<script>window.onload = function() { section_updated(); }</script>';
 }
 if(isset($_GET['deleted'])){
    echo '<script>window.onload = function() { section_deleted(); }</script>';
}
if(isset($_GET['created'])){
    echo '<script>window.onload = function() { section_created(); }</script>';
}
?>
@endsection
@push('script')
<script src="{{ secure_asset('js/dashboard.js')}}"></script>
<script src="{{ secure_asset('js/login.js')}}"></script>
<script>
function filterSections(searchBarId, sectionContainerId) {
    document.getElementById(searchBarId).addEventListener('input', function() {
        let searchTerm = this.value.toLowerCase();
        let sectionCards = document.querySelectorAll(`#${sectionContainerId} .section-card`);

        sectionCards.forEach(function(card) {
            let sectionName = card.querySelector('.card-title').innerText.toLowerCase();
            let gradeLevel = card.querySelector('.list-group-item:nth-child(1)').innerText.toLowerCase();
            let schoolYear = card.querySelector('.list-group-item:nth-child(2)').innerText.toLowerCase();

            if (sectionName.includes(searchTerm) || gradeLevel.includes(searchTerm) || schoolYear.includes(searchTerm)) {
                card.parentElement.style.display = ''; // Show card
            } else {
                card.parentElement.style.display = 'none'; // Hide card
            }
        });
    });
}

// Apply the filter function to both search bars
filterSections('search-bar-active', 'active-sections');
filterSections('search-bar-archived', 'archived-sections');
</script>

<!-- Search and Sort Script -->
@endpush
