@extends('layouts.master-layout')
@push('css')
    <link href="{{secure_asset('css/admin.css')}}" rel="stylesheet">
    <link href="{{secure_asset('css/dashboard.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
@endpush

@section('content')
<body>

<div id="shadow">
</div>

<div id="centered-container-schools">
    <center>
        <div class='container-fluid  mt-4'>
            <div>
                <h1 class="pt-3">Add School</h1>
            </div>
            <hr>
            <form id="register-student-form" action="{{route('update-school.post',['id' => $school->id])}}" method="POST">
                @csrf
                <br>
                <div id="container">
                    <div class="row">
                        <div class="mb-3 col-sm">
                            <label class="form-label">Name</label> 
                            <input type="text" class="form-control" id="name" name="name"  value="{{$school->name}}" required>  
                        </div>
                        <div class="mb-3 col-sm">
                            <label class="form-label">Region</label>
                            <input type="text" class="form-control" id="region" name="region" value="{{$school->region}}" required>                
                        </div>
                        <div class="mb-3 col-sm">
                            <label class="form-label">Division</label>
                            <input type="text" class="form-control" id="division" name="division" value="{{$school->division}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm">
                            <label class="form-label">District</label> 
                            <input type="text" class="form-control" id="district" name="district" value="{{$school->district}}" required>  
                        </div>
                        <div class="mb-3 col-sm">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{$school->address}}" required>                
                        </div>
                    </div>    
                    <center>
                    <button type="submit" class="btn btn-primary">
                        Update School
                    </button>
                    </center>
                </div>
            </form>
        </div>
    </center>
</div>
</body>
@endsection
@push('script')
    <script src="{{ secure_asset('js/login.js')}}"></script>
@endpush

