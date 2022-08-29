<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $req){

        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validatedData)) {

            if(Auth::user()->reg_level == 1){

                Auth::logout();
                $req->session()->invalidate();
                $req->session()->regenerateToken();

                session(['verify_email' => $validatedData['email']]);
                return redirect('/verify');
            }

            if(Auth::user()->reg_level == 2){
                $req->session()->regenerate();
                return redirect()->intended('/profile');
            }

            $req->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
 
        return back()->withErrors([
            'email' => 'Error | Invalid Login Credentials',
        ])->onlyInput('email');

    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
