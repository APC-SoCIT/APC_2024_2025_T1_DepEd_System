@extends('layouts.master-layout')
@push('css')
    <link href="{{secure_asset('css/register.css')}}" rel="stylesheet">
@endpush

@section('content')
<body>

<div id="shadow">
</div>

<div id="centered-container">
    <center>
        <a href="{{route('login')}}" class="no-effects"><img id="logo" src="{{ secure_asset('DepEd_logo.ico') }}"></a>
        <p id='heading'><b>DepED Teacher Portal</b></p>
        <p id='subheading'>Department of Education Record System</p>
        <form id="login" action="{{route('registerTeacher.post')}}" method="POST">
        @csrf
        <div id="container">
            <div class="row">
            <div class="mb-3 col-sm">
                <label class="form-label">First Name</label> 
                <input type="text" class="form-control" id="fname" name="fname" required>  
           </div>
            <div class="mb-3 col-sm">
                <label class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="mname" name="mname" required>                
            </div>
            <div class="mb-3 col-sm">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" required>
            </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="sid">School Name</label>
                <select class="form-control center-placeholder" id="sid" name="sid" required>
                    <option value="" disabled selected>--</option>
                    @foreach($schools as $school)
                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="mb-3">
                    <label class="form-label">Teacher ID</label>
                    <input type="text" class="form-control" id="tid" name="tid" required>
                </div>
                <div class="mb-3 col-sm">
                <label class="form-label" for="sex">Sex</label>
                <select class="form-control center-placeholder" id="sex" name="sex" required>
                    <option value="" disabled selected>--</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <!-- Add more options as needed -->
                </select>
                </div>
                <div class="mb-3 col-sm">
                    <label class="form-label" for="bday">Birthday</label>
                    <input type="date" class="form-control" id="bday" name="bday" required>
                </div>
            </div>
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
            <div class="row">
                <div class="mb-3 col-sm">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3 col-sm">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 512 512">
                <style>svg{fill:#ffffff}</style>
                <path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/>
            </svg>
            Register
        </button>
        </form>
        <?php
         if(isset($_GET['error'])){
            echo '<script>window.onload = function() { register_error(); }</script>';
        }
        ?>
    </center>
</div>
</body>
@endsection
@push('script')
    <script src="{{secure_asset('js/login.js')}}"></script>
@endpush

