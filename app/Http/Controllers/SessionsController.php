<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy(){
     auth()->logout();
     return redirect('/')->with('success', 'Goodbye!');
    }

    public function create(){
        return view('sessions.create');
    }

    public function store(){
        //validate request

        $credentials = request()->validate([
            'email' => ['required'], //, Rule::exists('users', 'email')
            'password' => ['required']
        ]);
        //authenticate user and log in user
            if(!auth()->attempt($credentials)){
                 // auth failed
                throw ValidationException::withMessages([
                    'email' => 'Your provided credentials could not be verified!'
                ]);
            }

            //redirecet with success message
            session()->regenerate();
             return redirect('/')->with('success', 'Welcome Back!');

            // return back()
            // ->withInput()
            // ->withErrors(['email' => 'Your provided credentials could not be verified!']);
    }
}
