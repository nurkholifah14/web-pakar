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
        // $input = $request->all();

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

    public function logout(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
