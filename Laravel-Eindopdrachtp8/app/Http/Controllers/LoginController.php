<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Login;
use Illuminate\Support\Facades\Password;
use Session;
use Hash;

class LoginController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function postLogin(LoginRequest $request)
    {
        //valideren, bevestigen
        $request->validate([
            //voorwaarden
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        //authenticatie
        if (Auth::attempt($credentials)) {
            return redirect()->route('game');
        }
        $request->session()->flash('status', 'Wrong combination');
        return redirect()->route('login');
    }

    public function logout()
    {
        //session destroy
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}