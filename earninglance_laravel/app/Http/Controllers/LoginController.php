<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('login');
    }

    public function login()
    {
        validator(request()->all(), [
            'username' => ['required'],
            'password' => ['required']
        ])->validate();

        if (auth()->attempt(request()->only(['username', 'password', 'remember']))) {
            return redirect('/dashboard');
        }

        return redirect()->back()->withErrors(['username' => 'Invalid Username', 'password' => 'Invalid Password']);
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }
}
