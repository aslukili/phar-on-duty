<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        return view('villes.index',[
            'title' => 'toutes les villes',
            'cities' => City::latest()->filter(\request(['search']))->paginate(12)
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'unique:cities']
        ]);
        City::create($formFields);
        return redirect('/villes')->with('message', 'City added successfully!');
    }
}
