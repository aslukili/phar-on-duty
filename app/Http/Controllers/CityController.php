<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('cities.index',[
            'title' => 'toutes les cities',
            'cities' => City::latest()->filter(\request(['search']))->paginate(12),
            'users' => User::all()->sortBy('name'),
            'authUser' => Auth::user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'unique:cities'],
            'user_id' => 'nullable',
        ]);

        City::create($formFields);
        return redirect('/cities')->with('message', 'City added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(City $city)
    {
        return view('cities.edit', [
            'title' => 'edit city',
            'authUser' => Auth::user(),
            'users' => User::all()->sortBy('name'),
            'city' => $city
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, City $city)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'user_id' => 'nullable',
        ]);
        $city->update($formFields);
        return redirect('/cities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect('/cities');
    }
}
