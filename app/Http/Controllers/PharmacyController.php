<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function index()
    {
        return view('pharmacies.index',[
            'title' => 'All Pharmacies',
            'pharmacies' => Pharmacy::latest()->filter(\request(['search']))->paginate(16),
        ]);
    }

    public function create()
    {
        return view('pharmacies.create', [
            'title' => 'ajouter une pharmacie',
            'cities' => City::all()->sortBy('name')
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name_ar' => 'required',
            'name_fr' => 'required',
            'address_ar' => 'required',
            'address_fr' => 'required',
            'city_name' => 'required',
            'map_link' => ['required', 'url', 'unique:pharmacies,map_link'],
            'tel' => 'unique:pharmacies,tel',
            'email' => ['email', 'unique:pharmacies,email']
        ]);
        Pharmacy::create($formFields);
        return redirect('/pharmacies')->with('message', 'Pharmacy added successfully!');
    }

    public function destroy(Pharmacy $pharmacy)
    {
        $pharmacy->delete();
        return redirect('/pharmacies')->with('message', 'pharmacy deleted');
    }
}
