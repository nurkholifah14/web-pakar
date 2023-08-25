<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        
        $credentials = $request->validate([
            'email'=> 'required',
            'password'=>'required'
        ]);

        $cek = User::where("email", $request->email)->first();

        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $request->session()->regenerate();

            if ($cek->role == "admin") {
                return redirect()->intended("/admin");
            } else if($cek->role == "user") {
                return redirect()->intended("/identitas");
            } else {
                return back();
            }
        } else {
            return back();
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|min:5',
        ]);
        User::where("id", Auth::user()->id)->update([
            "password" => bcrypt($request["new_password"])
           ]);
        return redirect('/admin');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "email" => "required",
        ]);
        User::where("id", Auth::user()->id)->update([
            "name" => $request['name'],
            "email" => $request['email'],
           ]);
        return redirect('/admin');

    }

    public function profile(){
        return view('login.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "email" => "required",
            'old_password' => 'required|current_password',
            'new_password' => 'required|min:5',
        ]);
        User::where("id", Auth::user()->id)->update([
            "name" => $request['name'],
            "email" => $request['email'],
            "password" => bcrypt($request["new_password"])
           ]);
        return redirect('/profile');

    }

    public function logout(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
