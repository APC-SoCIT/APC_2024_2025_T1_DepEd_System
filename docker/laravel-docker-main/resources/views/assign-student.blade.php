@extends('layouts.dashboard-layout')

@section('content')
<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <center>
                        <a href="{{route('dashboard-teacher')}}" class="no-effects">
                            <img id="logo" src="{{ asset('DepEd_logo.ico') }}">
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
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#grades" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-medal"></i> Manage Grades
                        </a>
                        <ul id="grades" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar"></ul>
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
                                <p><a href="" class="dropdown-item"><i class="fa-solid fa-pen-to-square"></i> Edit Profile</a></p>
                                <p><a href="{{route('logout')}}" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content px-3 py-2">
                <div class="container-fluid" id="view-student">
					<div>
                        <h3 class="pt-3">{{$section->secname}}</h3>
                    </div>
                    <hr>
					<!-- Search Bar -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <input type="text" id="search-bar-section" class="form-control" placeholder="Search by name or LRN in Section">
                        </div>
                    </div>
					<div class="section-student-table">
                        <form id="remove-student-form" action="{{route('removeStudent.post',$section->id)}}" method="POST">
                        @csrf
                        <table class="table" id="section-student-table">
                            <thead>
                                <tr>
                                    <th scope="col">LRN <button type="button" class="btn-sort" data-column="lrn"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col">First Name <button type="button" class="btn-sort" data-column="fname"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col">Middle Name <button type="button" class="btn-sort" data-column="mname"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col">Last Name <button type="button" class="btn-sort" data-column="lname"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col">Section<button type="button" class="btn-sort" data-column="section"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col"><center>Action<center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    @if($student->section === $section->id)
                                        <tr>
                                            <td>{{$student->lrn}}</td>
                                            <td>{{$student->fname}}</td>
                                            <td>{{$student->mname}}</td>
                                            <td>{{$student->lname}}</td>
                                            <td>{{$student->secname ?? 'N/A'}}</td> <!-- Show section name or 'N/A' if not found -->
                                            <td>
                                                <center>
                                                <input type="checkbox" class="btn-check" id="remove-from-section-{{$student->id}}" name="students[{{$student->id}}][assign]" value="1" autocomplete="off">
                                                <label class="btn btn-outline-danger" for="remove-from-section-{{$student->id}}">Remove Student</label>
                                                </center>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <center>
                        <button type="submit" class="btn btn-danger mb-3">
                            <i class="fa-solid fa-trash"></i> Remove Student/s
                        </button>
                        </center>
                        </form>
                    </div>
					
                    <div>
                        <h3 class="pt-3">Student Database</h3>
                    </div>
                    <hr>
                    
                    <!-- Search Bar -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <input type="text" id="search-bar-database" class="form-control" placeholder="Search by name or LRN in Database">
                        </div>
                    </div>
                    <div class="student-table">
                        <form id="assign-student-form" action="{{route('assignStudent.post',$section->id)}}" method="POST">
                        @csrf
                        <table class="table" id="student-table">
                            <thead>
                                <tr>
                                    <th scope="col">LRN <button type="button" class="btn-sort" data-column="lrn"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col">First Name <button type="button" class="btn-sort" data-column="fname"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col">Middle Name <button type="button" class="btn-sort" data-column="mname"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col">Last Name <button type="button" class="btn-sort" data-column="lname"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col">Section<button type="button" class="btn-sort" data-column="section"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col">Teacher<button type="button" class="btn-sort" data-column="teacher"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col"><center>Action<center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    @if($student->section !== $section->id)
                                        <tr>
                                            <td>{{$student->lrn}}</td>
                                            <td>{{$student->fname}}</td>
                                            <td>{{$student->mname}}</td>
                                            <td>{{$student->lname}}</td>
                                            <td>{{$student->secname ?? 'N/A'}}</td> <!-- Show section name or 'N/A' if not found -->
                                            <td>{{$student->tid}}</td>
                                            <td>
                                            <center>
                                                <input type="checkbox" class="btn-check" id="assign-to-section-{{$student->id}}" name="students[{{$student->id}}][assign]" value="1" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="assign-to-section-{{$student->id}}">Add Student</label>
                                            </center>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <center>
                        <button type="submit" class="btn btn-primary mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 512 512">
                                <style>svg{fill:#ffffff}</style>
                                <path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/>
                            </svg>
                            Assign Student/s
                        </button>
                        </center>
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
<script src="{{ asset('js/dashboard.js')}}"></script>
<script src="{{ asset('js/login.js')}}"></script>
<script src="{{ asset('js/section.js')}}"></script>

<!-- Search and Sort Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Search for students in the section table
    const searchBarSection = document.getElementById('search-bar-section');
    const sectionTableRows = document.querySelectorAll('#section-student-table tbody tr');

    searchBarSection.addEventListener('keyup', function() {
        const searchTerm = searchBarSection.value.toLowerCase();
        sectionTableRows.forEach(row => {
            const lrn = row.cells[0].textContent.toLowerCase();
            const fname = row.cells[1].textContent.toLowerCase();
            const mname = row.cells[2].textContent.toLowerCase();
            const lname = row.cells[3].textContent.toLowerCase();
            const section = row.cells[4].textContent.toLowerCase();
            if (lrn.includes(searchTerm) || fname.includes(searchTerm) || mname.includes(searchTerm) || lname.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Search for students in the database
    const searchBarDatabase = document.getElementById('search-bar-database');
    const databaseTableRows = document.querySelectorAll('#student-table tbody tr');

    searchBarDatabase.addEventListener('keyup', function() {
        const searchTerm = searchBarDatabase.value.toLowerCase();
        databaseTableRows.forEach(row => {
            const lrn = row.cells[0].textContent.toLowerCase();
            const fname = row.cells[1].textContent.toLowerCase();
            const mname = row.cells[2].textContent.toLowerCase();
            const lname = row.cells[3].textContent.toLowerCase();
            if (lrn.includes(searchTerm) || fname.includes(searchTerm) || mname.includes(searchTerm) || lname.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

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

    // Add sorting functionality for database table
    const databaseSortButtons = document.querySelectorAll('#student-table .btn-sort');
    databaseSortButtons.forEach(button => {
        button.addEventListener('click', function () {
            const column = button.getAttribute('data-column');
            const direction = button.dataset.direction || 'asc';
            sortTable('#student-table', column, direction);
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
            'section': 4, 
            'tid': 5 
        }[column];

        // Log the current column being sorted for debugging
        console.log(`Sorting column: ${column} in ${direction} order`);

        rowsArray.sort((a, b) => {
            const aText = a.cells[columnIndex].textContent.trim().toLowerCase();
            const bText = b.cells[columnIndex].textContent.trim().toLowerCase();
            return direction === 'asc' ? aText.localeCompare(bText) : bText.localeCompare(aText);
        });

        rowsArray.forEach(row => table.querySelector('tbody').appendChild(row));
    }
});
</script>
@endpush
