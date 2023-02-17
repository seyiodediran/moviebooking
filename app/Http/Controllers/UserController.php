<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show register/create form

    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {

        $formfields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        //hash password
        $formfields['password'] = bcrypt($formfields['password']);

        // TO CREATE USER AND AUTOMATICALLY LOGIN

        //create user
        $user = User::create($formfields);
        //login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in successfully');
    }

    public function logout(Request $request)
    {
        auth()->logout(); //remove authentication info from user session

        //it is recommended we invalidate the user session and regenerate ytheir token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'you have been logged out');
    }

    public function login() {
        return view('users.login');
    }

    public function authenticate(Request $request) {
        $formfields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formfields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'you are now logged in');
        }


        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');

        
    }
}

