<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login(Request $request){    
        $credentials = ['name' => $request->name, 'password' => $request->password];

        $validation = Validator::make($credentials, [
                'name' => 'required',
                'password' => 'required'
            ],
            [
                'name.required' => 'Title required',
                'password.required' => 'Password required',
            ]
        );

        if($validation->fails()){
            return redirect()->back()->with('errors', $validation->errors());
        }

        if(Auth::attempt($credentials) ){
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('error', "Check your title or password");
    }

    public function register_page(){
        return view("register");
    }

    public function register(Request $request){
        $validation = Validator::make($request->all(), [
                'name' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed|min:6'
            ],
            [
                'name.required' => 'Title required',
                'name.unique' => 'Title already exist',
                'email.required' => 'Email is required',
                'email.email' => 'Must be of type email',
                'email.unique' => 'Email already exist',    
                'password.required' => 'Password required',
                'password.confirmed' => 'Password must be confirmed',
                'password.min' => 'Password must have at least 6 characters'
            ]
        );

        if($validation->fails()){
            return redirect()->back()->with('errors', $validation->errors());
        }
        
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return redirect()->route('home')->with('success', 'Registered successfully');
    }

    public function forgot_password_page(){

        return view('forgot_password');
    }

    public function forgot_password(){

        return redirect()->back();
    }

    public function logout(){

        Auth::logout();

        return redirect()->route('home');
    }
}
