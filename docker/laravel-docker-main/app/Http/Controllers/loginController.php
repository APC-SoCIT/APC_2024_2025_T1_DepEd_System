<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class loginController extends Controller
{
    function login(){
        return view('login');
    }
    function loginTeacher(){
        return view('login-teacher');
    }
    function loginStudent(){
        return view('login-student');
    }
    function loginError(){
        return view('login?error');
    }
    function register(){
        return view('register');
    }
    function registerError(){
        return view('register?error');
    }
    function registerTeacher(Request $request){
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'sname'=>'required',
            'sid'=>'required',
            'district'=>'required',
            'email'=>'required',
            'password'=>'required|confirmed',
            'cpassword'=>'required',
        ]);
    
        if ($request->password !== $request->cpassword) {
            return redirect()->route('register', http_build_query(array_merge(\Request::query(), ['error' => true])));
        }
    
        $data = [
            'fname' => $request->fname,
            'lname' => $request->lname,
            'sname' => $request->sname,
            'sid' => $request->sid,
            'district' => $request->district,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
    
        // Must Edit this and Models/User.php
        $user = User::create($data);
    
        return redirect()->route('login-teacher', http_build_query(array_merge(\Request::query(), ['registered' => true])));
    }
}