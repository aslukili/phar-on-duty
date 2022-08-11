<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PharmacyController extends Controller
{
    public function index()
    {
        if (\request()->has('search')) {
            return view('pharmacies.index',[
                'title' => 'All Pharmacies',
                'pharmacies' => Pharmacy::latest()
                    ->filter(\request(['search']))->paginate(16),
                'cities' => City::all(),
                'authUser' => Auth::user()
            ]);
        }
        if (\request()->has('city')) {
            return view('pharmacies.index',[
                'title' => 'All Pharmacies',
                'pharmacies' => Pharmacy::latest()
                    ->filter(\request(['city']))->paginate(16),
                'cities' => City::all(),
                'authUser' => Auth::user()
            ]);
        }
        return view('pharmacies.index',[
            'title' => 'All Pharmacies',
            'pharmacies' => Pharmacy::paginate(10),
            'cities' => City::all(),
            'authUser' => Auth::user()
        ]);
    }

    public function create()
    {
        $cities = City::where('user_id', Auth::id())->get();

        if ($cities->isEmpty()) {
            $cities = City::all();
        }

        return view('pharmacies.create', [
            'title' => 'ajouter une pharmacie',
            'cities' => $cities,
//            'cities' => City::all()->sortBy('name'),
            'authUser' => Auth::user()
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
            'map_iframe' => 'required',
            'map_link' => ['required', 'url', 'unique:pharmacies,map_link'],
            'tel' => 'unique:pharmacies,tel',
            'email' => 'nullable'
        ]);
        Pharmacy::create($formFields);
        return redirect('/pharmacies')->with('message', 'Pharmacy added successfully!');
    }

    public function destroy(Pharmacy $pharmacy)
    {
        $pharmacy->delete();
        return redirect('/pharmacies')->with('message', 'pharmacy deleted');
    }

    public function edit(Pharmacy $pharmacy)
    {
        return view('pharmacies.edit', [
            'title' => 'edit Pharmacy',
            'pharmacy' => $pharmacy,
            'cities' => City::all(),
            'authUser' => Auth::user()
        ]);
    }

    public function update(Request $request, Pharmacy $pharmacy)
    {
        $formFields = $request->validate([
            'name_ar' => 'required',
            'name_fr' => 'required',
            'address_ar' => 'required',
            'address_fr' => 'required',
            'city_name' => 'required',
            'map_iframe' => 'required',
            'map_link' => ['required', 'url'],
            'tel' => 'nullable',
            'email' => 'email'
        ]);
        $pharmacy->update($formFields);
        return redirect('/pharmacies');
    }
}
