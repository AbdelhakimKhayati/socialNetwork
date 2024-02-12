<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Contracts\Session\Session;
// use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function Login(){
        return view('login.login');
    }
    public function store(Request $request){
        $email = $request->email;
        $password = $request->password;
        $values = ['email' => $email, 'password' => $password];


        if (Auth::attempt($values)) {
            // conectiweh

            $request->session()->regenerate();
            return to_route('home')->with('success', 'Vous etezs bien connecte  '.$email.' ');
        } else {
            // chi haja ghalta

            return back()->withErrors([
                'email' => 'Email ou mot de pass incorrect'
            ])->onlyInput('email');

        }

    }
    public function logout(){
        Session::flash('message', 'This is a message!');
        Auth::logout();

        return to_route('login')->with('success', 'Vous etes bien deconecte');
    }
}
