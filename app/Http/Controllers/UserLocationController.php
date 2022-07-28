<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class UserLocationController extends Controller
{
    //
    public function user()
    {
        $ip = request()->ip(); //ip of the user which is currently visiting.
        $data = Location::get($ip);
        dd($data);
        return view('home', [
            'data' => $data
        ]);
    }
}
