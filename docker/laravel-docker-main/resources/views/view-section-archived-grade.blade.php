@extends('layouts.dashboard-layout')

@section('content')
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
                <div class="container-fluid" id="view-student">
                    <div class='row d-flex justify-content-between align-items-center'>
                        <div class="col-sm-auto">
                            <h1 class="pt-3 mb-0">{{$section->secname}}</h1>
                        </div>
                        <div class="col-sm-auto">
                            <a href="{{route('manage-grades')}}" class="btn btn-primary">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <hr>
					<!-- Search Bar -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <input type="text" id="search-bar-section" class="form-control" placeholder="Search by name or LRN in Section">
                        </div>
                    </div>
					<div class="section-student-table">
                        <table class="table" id="section-student-table">
                            <thead>
                                <tr>
                                    <th scope="col">LRN <button type="button" class="btn-sort" data-column="lrn"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col">First Name <button type="button" class="btn-sort" data-column="fname"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col">Middle Name <button type="button" class="btn-sort" data-column="mname"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col">Last Name <button type="button" class="btn-sort" data-column="lname"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col"><center>Action<center></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->lrn }}</td>
                                    <td>{{ $student->fname }}</td>
                                    <td>{{ $student->mname }}</td>
                                    <td>{{ $student->lname }}</td>
                                    <td>
                                        <center>
                                            <a class="btn btn-outline-primary" href="{{ route('view-archived-grades', ['id' => $student->id, 'section' => $section->id]) }}">View Grade</a>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
 if(isset($_GET['removed'])){
    echo '<script>window.onload = function() { students_removed(); }</script>';
 }
 if(isset($_GET['added'])){
    echo '<script>window.onload = function() { students_added(); }</script>';
 }
?>
@endsection

@push('script')
<script src="{{ secure_asset('js/dashboard.js')}}"></script>
<script src="{{ secure_asset('js/login.js')}}"></script>
<script src="{{ secure_asset('js/section.js')}}"></script>

<!-- Search and Sort Script -->
<script>
// Add sorting functionality for section table
const sectionSortButtons = document.querySelectorAll('#section-student-table .btn-sort');
sectionSortButtons.forEach(button => {
    button.addEventListener('click', function () {
        const column = button.getAttribute('data-column');
        const direction = button.dataset.direction || 'asc';
        sortTable('#section-student-table', column, direction);
        button.dataset.direction = (direction === 'asc') ? 'desc' : 'asc';
    });
});

function sortTable(tableSelector, column, direction) {
    const table = document.querySelector(tableSelector);
    const rowsArray = Array.from(table.querySelectorAll('tbody tr'));
    const columnIndex = {
        'lrn': 0,
        'fname': 1,
        'mname': 2,
        'lname': 3,
        // If there's a specific column index for actions, consider its index
        'section': 4, 
    }[column];

    // Log the current column being sorted for debugging
    console.log(`Sorting column: ${column} in ${direction} order`);

    rowsArray.sort((a, b) => {
        const aText = a.cells[columnIndex].textContent.trim().toLowerCase();
        const bText = b.cells[columnIndex].textContent.trim().toLowerCase();
        
        if (direction === 'asc') {
            return aText.localeCompare(bText);
        } else {
            return bText.localeCompare(aText);
        }
    });

    // Append sorted rows back to the table body
    rowsArray.forEach(row => table.querySelector('tbody').appendChild(row));
}
</script>
@endpush
