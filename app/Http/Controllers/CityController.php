<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CityAdmin;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        return view('villes.index',[
            'title' => 'toutes les villes',
            'cities' => City::latest()->filter(\request(['search']))->paginate(12),
            'cityAdmins' => CityAdmin::all()->sortBy('full_name')
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'unique:cities'],
            'city_admin_id' => 'nullable',
        ]);

        City::create($formFields);
        return redirect('/villes')->with('message', 'City added successfully!');
    }
}
