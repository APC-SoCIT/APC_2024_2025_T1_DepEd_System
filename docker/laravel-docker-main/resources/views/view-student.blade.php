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
                    <div>
                        <h1 class="pt-3">Student Database</h1>
                    </div>
                    <hr>
                    
                    <!-- Search Bar -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <input type="text" id="search-bar" class="form-control" placeholder="Search by name or LRN">
                        </div>
                    </div>

                    <div class="student-table">
                        <table class="table" id="student-table">
                            <thead>
                                <tr>
                                    <th scope="col">LRN <button type="button" class="btn-sort" data-column="lrn"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col">First Name <button type="button" class="btn-sort" data-column="fname"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col">Middle Name <button type="button" class="btn-sort" data-column="mname"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col">Last Name <button type="button" class="btn-sort" data-column="lname"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col">Section<button type="button" class="btn-sort" data-column="section"><i class="fa-solid fa-sort"></i></button></th>
                                    <th scope="col">Teacher<button type="button" class="btn-sort" data-column="teacher"><i class="fa-solid fa-sort"></i></button></th>
                                    <th colspan="2"scope="col"><center>Action<center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td>{{$student->lrn}}</td>
                                    <td>{{$student->fname}}</td>
                                    <td>{{$student->mname}}</td>
                                    <td>{{$student->lname}}</td>
                                    <td>{{$student->secname ?? 'N/A'}}</td>
                                    <td>{{$student->tid}}</td>
                                    <td><a class="" href="{{route('update-student', ['id' => $student->id])}}"><button type="button" class="btn btn-primary" id="view-edit-btn">View/Update</button></a></td>
                                    <td>
                                        <form type="submit" action="{{route('studentDelete', ['student' => $student->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
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

@if(isset($_GET['updated']))
<script>
    window.onload = function() { updated(); };
</script>
@endif
@if(isset($_GET['update-error']))
<script>
    window.onload = function() { updateError(); };
</script>
@endif
@if(isset($_GET['deleted']))
<script>
    window.onload = function() { deleted(); };
</script>
@endif

@endsection

@push('script')
<script src="{{ asset('js/dashboard.js')}}"></script>
<script src="{{ asset('js/login.js')}}"></script>

<!-- Search and Sort Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchBar = document.getElementById('search-bar');
    const tableRows = document.querySelectorAll('#student-table tbody tr');

    searchBar.addEventListener('keyup', function() {
        const searchTerm = searchBar.value.toLowerCase();
        tableRows.forEach(row => {
            const lrn = row.cells[0].textContent.toLowerCase();
            const fname = row.cells[1].textContent.toLowerCase();
            const mname = row.cells[2].textContent.toLowerCase();
            const lname = row.cells[3].textContent.toLowerCase();
            const section = row.cells[4].textContent.toLowerCase();
            const tid = row.cells[5].textContent.toLowerCase();
            if (lrn.includes(searchTerm) || fname.includes(searchTerm) || mname.includes(searchTerm) || lname.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    document.querySelectorAll('.btn-sort').forEach(button => {
        button.addEventListener('click', function () {
            const column = button.getAttribute('data-column');
            const direction = button.dataset.direction || 'asc';
            sortTable(column, direction);
            button.dataset.direction = (direction === 'asc') ? 'desc' : 'asc';
        });
    });

    function sortTable(column, direction) {
        const rowsArray = Array.from(tableRows);
        const columnIndex = { 'lrn': 0, 'fname': 1, 'mname': 2, 'lname': 3, 'section': 4, 'tid': 5 }[column];
        
        rowsArray.sort((a, b) => {
            const aText = a.cells[columnIndex].textContent.trim().toLowerCase();
            const bText = b.cells[columnIndex].textContent.trim().toLowerCase();
            return direction === 'asc' ? aText.localeCompare(bText) : bText.localeCompare(aText);
        });

        rowsArray.forEach(row => document.querySelector('#student-table tbody').appendChild(row));
    }
});
</script>
@endpush
