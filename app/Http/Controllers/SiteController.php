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
        $nightPharmacies = GuardPharmacy::where('open_time', 'like', '%20:30%')
            ->whereDate('close_time', '=', Carbon::today()->toDateString())
            ->orWhereDate('close_time', '=', Carbon::tomorrow()->toDateString())
            ->where('city_name_fk', 'like', '%'.request('city').'%')
            ->get();
        return view('home',[
            'title' => 'pharmcien de guard',
            'nightPharmacies' => $nightPharmacies,
            'dayPharmacies' => GuardPharmacy::where('open_time', 'not like', '%20:30%')
            ->whereDate('open_time', '=', Carbon::today()->toDateString())
            ->where('city_name_fk', 'like', '%'.request('city').'%')->get(),
//            'pharmacies' => DB::table('guard_pharmacies')->where('city_name_fk', 'like', '%'.request('city').'%')->get(),
//            'pharmacies' => GuardPharmacy::latest()->filter(\request(['city']))->paginate(16),
            'cities' => City::all()->sortBy('name'),
        ]);
    }
}
