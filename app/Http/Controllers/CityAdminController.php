<?php

namespace App\Http\Controllers;

use App\Models\CityAdmin;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class CityAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('city-admins.index',[
            'title' => 'adminis de villes',
            'cityAdmins' => CityAdmin::latest()->filter(\request(['search']))->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('city-admins.create', [
            'title' => 'Ajouter admin'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'full_name' => 'required',
            'email' => ['required', 'email', 'unique:city_admins,email'],
            'phone' => ['required', 'unique:city_admins,phone'],
            'password' => 'required'
        ]);
        CityAdmin::create($formFields);
        return redirect('/city-admins');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CityAdmin  $cityAdmin
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(CityAdmin $cityAdmin)
    {
        return view('city-admins.show',[
            'title' => $cityAdmin->full_name,
            'cityAdmin' => $cityAdmin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CityAdmin  $cityAdmin
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(CityAdmin $cityAdmin)
    {
        return view('city-admins.edit', [
            'title' => 'edit city admin',
            'cityAdmin' => $cityAdmin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CityAdmin  $cityAdmin
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, CityAdmin $cityAdmin)
    {
        $formFields = $request->validate([
            'full_name' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'required',
            'password' => 'required'
        ]);
        $cityAdmin->update($formFields);
        return redirect('/city-admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CityAdmin  $cityAdmin
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(CityAdmin $cityAdmin)
    {
        $cityAdmin->delete();
        return redirect('/city-admins');
    }
}
