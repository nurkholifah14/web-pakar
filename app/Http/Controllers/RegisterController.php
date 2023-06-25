<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            "name" => "required|max:255",
            "email" => "required|unique:users,email|max:255",
            "password" => "required|min:5|max:8",
            "password_confirmation" => "required|min:5|max:8",
        ]);

        User::create([
            "name" => $validatedData['name'],
            "email" => $validatedData['email'],
            "password" => bcrypt($validatedData['password']),
            "password_confirmation" => bcrypt($validatedData['password_confirmation']),
            "role" => "user"
        ]);


        return redirect('/login')->with('success', 'Registration successfull!!. Please login!!');
       

    }
}
