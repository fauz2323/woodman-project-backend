<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login()
    {
        return view('web.auth.login');
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
