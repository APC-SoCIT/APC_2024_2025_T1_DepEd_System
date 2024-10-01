<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; // Ensure you're using the Auth facade
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class dashboardController extends Controller
{
    function dashboardTeacher(){
        return view('dashboard-teacher');
    }
    function dashboardStudent(){
        return view('dashboard-student');
    }
    function viewStudent(){
        $students = User::where('role', 'student')->get();
        return view('view-student', ['students'=>$students]);
    }
    function registerStudent(){
        return view('register-student');
    }
    function registerStudentPost(Request $request)
    {
        // Validate the input data
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'sex' => 'required',
            'bday' => 'required',
            'lrn' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        // Check if password and password confirmation match (optional, remove if not needed)
        if ($request->password !== $request->password_confirmation) {
            return redirect()->route('register-student', ['error' => true]);
        }

        // Retrieve logged-in user's tid and sid
        $loggedInUser = Auth::user();
        // Prepare the data for creating a new student
        $data = [
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'sid' => $loggedInUser->sid,  // Get the sid from the logged-in user
            'tid' => $loggedInUser->tid,  // Get the tid from the logged-in user
            'sex' => $request->sex,
            'lrn' => $request->lrn,
            'bday' => $request->bday,
            'email' => $request->email,
            'role' => 'student',
            'password' => Hash::make($request->lrn),  // Default password set to '0000', hash it for security
        ];

        // Try to create the new student user
        try {
            $user = User::create($data);
            return redirect()->route('register-student', ['registered' => true]);
        } catch (\Exception $e) {
            return redirect()->route('register-student', ['error' => true]);
        }
    }
}