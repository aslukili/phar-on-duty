<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'cities_count' => City::all()->count(),
            'pharmacies_count' => Pharmacy::all()->count(),
            'authUser' => Auth::user()
        ]);
    }
}
