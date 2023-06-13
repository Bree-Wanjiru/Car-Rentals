<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    //show register/create form
    public function create() {
        return view('users.register');
    }


    //create new user
    public function store(Request $request){
        //to validate
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);

        //login
        auth()->login($user);

        //redirect user to homepage once logged in
        return redirect('/')->with('message', 'User created and logged in');

    }


    //logout user
    public function logout(Request $request){
      //removes authentication info from user session so that other requests are not authenticated
        auth()->logout();

        //invalidate user session and regenerate user token(csrf)
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }


    //show login form
    public function login(){
        return view('users.login');
    }

    //authenticate user
    public function authenticate(Request $request) {
        //to validate
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
      
        //attempt successful
        if(auth()->attempt($formFields)) {
          //regenerate session id
          $request->session()->regenerate();

          return redirect('/')->with('message', 'You are now logged in!');

        }
 
        //attempt failed
        //array in the email field
        //onlyinput for email so that one cannot know if its the email or the password
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
