<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\GuardPharmacy;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class GuardPharmacyController extends Controller
{
    public function index()
    {
        return view('pharmacies-de-gard.index',[
            'title' => 'Les pharmacies de gard',
            'pharmacies' => Pharmacy::latest()->filter(\request(['search']))->paginate(16),
        ]);
    }

    public function create()
    {
        return view('pharmacies-de-gard.create', [
            'title' => 'ajouter une pharmacie',
            'cities' => City::all()->sortBy('name'),
            'pharmacies' => Pharmacy::all()->sortBy('name_fr')
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
}
