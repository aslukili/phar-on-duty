<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\GuardPharmacy;
use App\Models\Pharmacy;
use Carbon\Carbon;
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
            'nightPharmacies' => GuardPharmacy::whereDate('open_time', '=', Carbon::today()->toDateString())
            ->where([
                ['city_name_fk', 'like', '%'.request('city').'%'],
                ['open_time', 'like', '%20:30%'],
            ])->get(),
            'dayPharmacies' => GuardPharmacy::whereDate('open_time', '=', Carbon::today()->toDateString())
            ->where([
                ['city_name_fk', 'like', '%'.request('city').'%'],
                ['open_time', 'not like', '%20:30%']
            ])->get(),
//            'pharmacies' => DB::table('guard_pharmacies')->where('city_name_fk', 'like', '%'.request('city').'%')->get(),
//            'pharmacies' => GuardPharmacy::latest()->filter(\request(['city']))->paginate(16),
            'cities' => City::all()->sortBy('name'),
        ]);
    }
}
