<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }   //

    public function store(){
        //create the user
        $new_user = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255' ,'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6']
        ]);
       // $new_user['password'] = bcrypt($new_user['password']);
        $user = User::create($new_user);
        auth()->login($user);
        //session()->flash('success', 'Your account has been created');
        return redirect('/')->with('success', 'Your account has been created');
    }
}
