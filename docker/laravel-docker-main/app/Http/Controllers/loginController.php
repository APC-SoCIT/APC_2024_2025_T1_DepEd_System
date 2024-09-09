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
    function registerPost(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $data['username'] = $request->username;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        return redirect()->route('login');
    }
}