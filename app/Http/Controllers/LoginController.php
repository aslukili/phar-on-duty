<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login( Request $request)
    {
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' =>
            $request->password])) {
            return redirect()->intended(route('dashboard'));
        }
        return redirect('/login');
    }
}
