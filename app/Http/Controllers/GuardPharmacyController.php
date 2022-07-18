<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\GuardPharmacy;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuardPharmacyController extends Controller
{
    public function index()
    {
        if (\request()->has('search')) {
            return view('pharmacies-de-gard.index',[
                'title' => 'Les pharmacies de gard',
                'pharmacies' => GuardPharmacy::latest()->filter(\request(['city']))->paginate(16),
                'cities' => City::all()
            ]);
        }

        return view('pharmacies-de-gard.index',[
            'title' => 'Les pharmacies de gard',
            'pharmacies' => GuardPharmacy::all()->sortBy('city_name_fk'),
            'cities' => City::all()
        ]);
    }

    public function create()
    {
        return view('pharmacies-de-gard.create', [
            'title' => 'ajouter une pharmacie',
            'pharmacies' => Pharmacy::latest()->filter(\request(['city']))->get(),
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'city_name_fk' => 'required',
            'pharmacy_fk' => 'required',
            'open_time' => 'required',
            'close_time' => 'required',
        ]);
        GuardPharmacy::create($formFields);
        return redirect('/pharmacie-de-gard')->with('message', 'Pharmacy added successfully!');
    }

    public function destroy(GuardPharmacy $guardPharmacy)
    {
        $guardPharmacy->delete();
        return redirect('/pharmacie-de-gard')->with('message', 'pharmacy deleted');
    }
}
