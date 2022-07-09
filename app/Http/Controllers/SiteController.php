<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\GuardPharmacy;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class SiteController extends Controller
{
    public function fromRoute()
    {
        return redirect()->route('/home', ['city' => 'Tanger']);
    }

    public function index()
    {
        return view('home',[
            'title' => 'pharmcien de guard',
            'pharmacies' => GuardPharmacy::latest()->filter(\request(['city']))->paginate(16),
            'cities' => City::all(),
        ]);
    }
}
