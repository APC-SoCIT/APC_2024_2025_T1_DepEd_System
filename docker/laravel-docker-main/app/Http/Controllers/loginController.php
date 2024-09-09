<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            try{
                $request->validate([
                    'fname' => 'required',
                    'lname' => 'required',
                    'sname' => 'required',
                    'sid' => 'required',
                    'district' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required',
                    'password_confirmation' => 'required',
                ]);
            } catch (\Exception $e) {
                return redirect()->route('register', http_build_query(array_merge(\Request::query(), ['error' => true])));
            }
            if ($request->password !== $request->password_confirmation) {
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
        
            try {
                $user = User::create($data);
                return redirect()->route('login-teacher', http_build_query(array_merge(\Request::query(), ['registered' => true])));
            } catch (\Exception $e) {
                return redirect()->route('register', http_build_query(array_merge(\Request::query(), ['error' => true])));
            }
    }
}