<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function login(){
        return view('auth.login');
    }

    public function create(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        User::create($request->all());

        return Redirect::to('/login')->with('message', 'Account Created Successfully');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            return Redirect::route('employee.listing');
        }
        return Redirect::back()->with('message', 'Invalid credentials');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
