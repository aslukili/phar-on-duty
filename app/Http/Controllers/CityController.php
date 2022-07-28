<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CityAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    public function index()
    {
        return view('villes.index',[
            'title' => 'toutes les villes',
            'cities' => City::latest()->filter(\request(['search']))->paginate(12),
            'users' => User::all()->sortBy('name'),
            'user' => Auth::user()
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'unique:cities'],
            'user_id' => 'nullable',
        ]);

        City::create($formFields);
        return redirect('/villes')->with('message', 'City added successfully!');
    }
}
