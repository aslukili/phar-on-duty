<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login( Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))){
            return redirect('/dashboard');
        }
        return back()->with('error','lsdkjf');
    }
}
