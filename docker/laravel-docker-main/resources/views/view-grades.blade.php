@extends('layouts.dashboard-layout')

@section('content')
<link href="{{asset('css/grades.css')}}" rel="stylesheet">
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
                                <p><a href="" class="dropdown-item"><i class="fa-solid fa-pen-to-square"></i> Edit Profile</a></p>
                                <p><a href="{{route('logout')}}" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content px-3 py-2">
                <div class="container-fluid" id="view-student">
                    <br>
                    <div class="container">
                        <div class="row info-container align-items-center">
                            <div class="col-auto info-item">
                                <b>LRN:</b> 2021-Sample
                            </div>
                            <div class="col-auto info-item">
                                <b>NAME:</b> Sample Name
                            </div>
                            <div class="col-auto file-input-container">
                                <form id="file-upload-form" action="{{route('upload-grades-gemini')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label for="formFileSm" class="custom-file-upload btn btn-primary">
                                        Upload via Picture
                                    </label>
                                    <input class="form-control-file file-input-sm" id="formFileSm" type="file" required hidden>
                                </form>
                            </div>
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
                                <form>
                                    <tbody>
                                        <tr>
                                            <td>Mother Tongue</td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Filipino</td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>English</td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Math</td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Araling Panlipunan</td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Edukasyon sa Pagpapakatao</td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>MAPEH</td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Music</td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Arts</td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Physical Education</td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td>  
                                                <center>
                                                <input type="text" class="form-control-grades input-sm" id="" name="" value="">
                                                </center>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <center>
                                <button type="submit" class="btn btn-primary mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 512 512">
                                        <style>svg{fill:#ffffff}</style>
                                        <path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/>
                                    </svg>
                                    Save    
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
@endsection
@push('script')
<script src="{{ asset('js/dashboard.js')}}"></script>
<script src="{{ asset('js/login.js')}}"></script>
<script>
document.getElementById('formFileSm').addEventListener('change', function() {
    document.getElementById('file-upload-form').submit();
});
</script>
<!-- Search and Sort Script -->
@endpush
