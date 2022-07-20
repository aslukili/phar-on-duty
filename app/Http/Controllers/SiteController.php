<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\GuardPharmacy;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

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
            'pharmacies' => GuardPharmacy::where('city_name_fk', 'like', '%'.request('city').'%')->get(),
//            'pharmacies' => DB::table('guard_pharmacies')->where('city_name_fk', 'like', '%'.request('city').'%')->get(),
//            'pharmacies' => GuardPharmacy::latest()->filter(\request(['city']))->paginate(16),
            'cities' => City::all()->sortBy('name'),
        ]);
    }
}
