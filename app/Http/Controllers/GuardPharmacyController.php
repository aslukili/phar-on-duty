<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\GuardPharmacy;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class GuardPharmacyController extends Controller
{
    public function index()
    {
        if (\request()->has('city') && \request()->has('date')) {
            return view('pharmacies-de-gard.index',[
                'title' => 'Les pharmacies de gard',
                'pharmacies' => GuardPharmacy::latest()->filter(\request(['city', 'date']))->paginate(16),
                'cities' => City::all(),
                'authUser' => Auth::user()
            ]);
        }

        return view('pharmacies-de-gard.index',[
            'title' => 'Les pharmacies de gard',
            'pharmacies' => GuardPharmacy::where('open_time', 'like', '%'.date('Y-m-d').'%')->get(),
//            'pharmacies' => GuardPharmacy::all()->sortBy('city_name_fk'),
            'cities' => City::all(),
            'authUser' => Auth::user()
        ]);
    }

    public function create()
    {
        return view('pharmacies-de-gard.create', [
            'title' => 'ajouter une pharmacie',
            'pharmacies' => Pharmacy::latest()->filter(\request(['city']))->get(),
            'authUser' => Auth::user()
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'city_name_fk' => 'required',
            'pharmacy_fk' => ['required',
                Rule::unique('guard_pharmacies','pharmacy_fk')->where(function ($query) use ($request) {
                    $query->where('open_time', $request->get('open_time'));
                })
            ],
            'open_time' => 'required',
            'close_time' => 'required',
        ]);
        $pharmacy_fk = $request->pharmacy_fk;
        foreach ($pharmacy_fk as $pharmacy) {
            GuardPharmacy::create([
                'city_name_fk' => $request->city_name_fk,
                'pharmacy_fk' => $pharmacy,
                'open_time' => $request->open_time,
                'close_time' => $request->close_time
            ]);
        }

        return redirect('/pharmacie-de-gard')->with('message', 'Pharmacy added successfully!');
    }

    public function destroy(GuardPharmacy $guardPharmacy)
    {
        $guardPharmacy->delete();
        return redirect('/pharmacie-de-gard')->with('message', 'pharmacy deleted');
    }

//    public function delete()
//    {
//        DB::table('guard_pharmacies')->truncate();
//        return redirect('/pharmacie-de-gard');
//    }
}
