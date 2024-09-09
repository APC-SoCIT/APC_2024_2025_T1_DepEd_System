<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class dashboardController extends Controller
{
    function dashboardTeacher(){
        return view('dashboard-teacher');
    }
    function dashboardStudent(){
        return view('dashboard-student');
    }
}