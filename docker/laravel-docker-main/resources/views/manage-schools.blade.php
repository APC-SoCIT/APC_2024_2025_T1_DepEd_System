@extends('layouts.master-layout')
@push('css')
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
@endpush

@section('content')
<body>

<div id="shadow">
</div>

<div id="centered-container-schools">
    <center>
        <div class='container-fluid mt-4'>
            <div class='row d-flex justify-content-between align-items-center'>
                <div class="col-sm-auto">
                    <h1 class="pt-3 mb-0">School Database</h1>
                </div>
                <div class="col-sm-auto">
                    <a href="{{route('dashboard-admin')}}" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <hr>
            
            <!-- Back Button -->
            
                    
            <!-- Search Bar -->
            <div class="row mb-3">
                <div class="col-md-4 d-flex align-items-center">
                    <input type="text" id="search-bar" class="form-control me-2" placeholder="Search by name, region, division, district, or address">
                    <a href="{{ route('add-school') }}">
                        <button type="button" class="btn btn-primary mb-2" id="view-edit-btn">Add School</button>
                    </a>
                </div>
            </div>

            <!-- Table -->
            <div class="student-table">
                <table class="table" id="student-table">
                    <thead>
                        <tr>
                            <th scope="col" col-name="name">Name <button type="button" class="btn-sort" data-column="name"><i class="fa-solid fa-sort"></i></button></th>
                            <th scope="col" col-name="region">Region <button type="button" class="btn-sort" data-column="region"><i class="fa-solid fa-sort"></i></button></th>
                            <th scope="col" col-name="division">Division <button type="button" class="btn-sort" data-column="division"><i class="fa-solid fa-sort"></i></button></th>
                            <th scope="col" col-name="district">District <button type="button" class="btn-sort" data-column="district"><i class="fa-solid fa-sort"></i></button></th>
                            <th scope="col" col-name="address">Address <button type="button" class="btn-sort" data-column="address"><i class="fa-solid fa-sort"></i></button></th>
                            <th colspan="2" scope="col" col-name="action"><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schools as $school)
                        <tr>
                            <td>{{$school->name}}</td>
                            <td>{{$school->region}}</td>
                            <td>{{$school->division}}</td>
                            <td>{{$school->district}}</td>
                            <td>{{$school->address}}</td>
                            <td><a class="" href="{{route('update-school', ['id' => $school->id])}}"><button type="button" class="btn btn-primary" id="view-edit-btn">View/Update</button></a></td>
                            <td>
                                <form type="submit" action="{{ route('schoolDelete', ['id' => $school->id]) }}" method="POST">
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
    </center>
</div>

</body>
<?php
    if(isset($_GET['schoolAdded'])){
        echo '<script>window.onload = function() { schoolAdded(); }</script>';
    }
    if(isset($_GET['updated'])){
        echo '<script>window.onload = function() { schoolUpdated(); }</script>';
    }
    if(isset($_GET['deleted'])){
        echo '<script>window.onload = function() { schoolDeleted(); }</script>';
    }
?>

@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchBar = document.getElementById('search-bar');
    const tableRows = document.querySelectorAll('#student-table tbody tr');

    searchBar.addEventListener('keyup', function() {
        const searchTerm = searchBar.value.toLowerCase();
        tableRows.forEach(row => {
            const name = row.cells[0].textContent.toLowerCase();
            const region = row.cells[1].textContent.toLowerCase();
            const division = row.cells[2].textContent.toLowerCase();
            const district = row.cells[3].textContent.toLowerCase();
            const address = row.cells[4].textContent.toLowerCase();

            if (name.includes(searchTerm) || region.includes(searchTerm) || division.includes(searchTerm) || district.includes(searchTerm) || address.includes(searchTerm)) {
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
        const columnIndex = { 
            'name': 0, 
            'region': 1, 
            'division': 2, 
            'district': 3, 
            'address': 4 
        }[column];

        rowsArray.sort((a, b) => {
            const aText = a.cells[columnIndex].textContent.trim().toLowerCase();
            const bText = b.cells[columnIndex].textContent.trim().toLowerCase();
            return direction === 'asc' ? aText.localeCompare(bText) : bText.localeCompare(aText);
        });

        rowsArray.forEach(row => document.querySelector('#student-table tbody').appendChild(row));
    }
});
</script>
@push('script')
<script src="{{ asset('js/login.js')}}"></script>
@endpush

