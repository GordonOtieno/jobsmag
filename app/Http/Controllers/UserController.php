<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(){
        return view('users.register');
    }

    public function store(Request $request){

        $formFields = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);
        
        //hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);

        //loggin user

        auth()->login($user);
        return redirect('/')->with('success','User created and loggedin  successfully.');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success','You have been logged out successfully.');

    }

    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required','email'],
            'password' => 'required',
        ]);

        if (auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('success','You have been log In successfully.');
        }
        return back()->withErrors(['email'=>'Invalid Logged In Credentials'])->onlyInput('email');
    }
}
