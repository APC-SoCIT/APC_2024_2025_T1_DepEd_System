@extends('layouts.dashboard-layout')

@section('content')
<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <center><a href="{{route('dashboard-teacher')}}" class="no-effects"><img id="logo" src="{{ asset('DepEd_logo.ico') }}"></a>
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
                    <div class='row d-flex justify-content-between align-items-center'>
                        <div class="col-sm-auto">
                            <h1 class="pt-3">Update Section</h1>
                        </div>
                        <div class="col-sm-auto">
                            <a href="{{route('view-section')}}" class="btn btn-primary">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <hr>
                        <form id="register-student-form" action="{{route('updateSection.post',['id' => $section->id])}}" method="POST">
                        @csrf
                        <br>
                        <div id="container">
                            <div class="mb-12 col-sm">
                                <label class="form-label">Section Name</label> 
                                <input type="text" class="form-control" id="secname" name="secname" required value="{{$section->secname}}">  
                            </div>
                            <div class="row">
                                <div class="mb-6 col-sm">
                                    <label class="form-label">Grade Level</label>
                                    <select class="form-control center-placeholder" id="grade" name="grade" required>
                                        <option value="" disabled>--</option>
                                        @for ($i = 1; $i <= 6; $i++)
                                            <option value="{{ $i }}" {{ $i === $section->grade ? 'selected' : '' }}>Grade {{ $i }}</option>
                                        @endfor
                                    </select>               
                                </div>
                                <div class="mb-6 col-sm">
                                    <label class="form-label">School Year</label>
                                    <input type="text" class="form-control" id="school_year" name="school_year" required placeholder="Format: 20XX-20XX *No Spaces*" value="{{$section->school_year}}">
                                </div>
                            </div>
                        </div>
                        <center>
                        <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-primary mx-2">
                            Update
                        </button>
                        </form>
                        <form action="{{ route('sectionArchive', ['section' => $section->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary mx-2">Archive</button>
                        </form>
                        </div>
                        <form action="{{ route('sectionDelete', ['section' => $section->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-2">Delete</button>
                        </form>
                        <center>
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
<script src="{{ asset('js/dashboard.js')}}"></script>
<script src="{{ asset('js/login.js')}}"></script>
@endpush
