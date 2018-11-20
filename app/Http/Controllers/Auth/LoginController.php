<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest' , ['only' => 'showFormLogin']);
    }
    public function showFormLogin(){
        return view("backend.auth.login");
    }

    public function login(){
        $credentials = $this->validate(request(),[
            $this->username() => 'email|required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()
            ->withErrors([$this->username() => trans('auth.failed')])
            ->withInput(request([$this->username()]));
    }

    public function logout(){
        Auth::logout();

        return redirect('/login');
    }

    public function username(){
        return "email";
    }
}
