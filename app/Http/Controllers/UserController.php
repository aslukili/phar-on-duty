<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //first sever methods for resources option; then there is profile method

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('users.index',[
            'title' => 'admins de cities',
            'users' => User::latest()->filter(\request(['search']))->paginate(8),
            'authUser' => Auth::user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('users.create', [
            'title' => 'Ajouter admin',
            'authUser' => Auth::user(),
            'cities' => City::all()
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
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'unique:users,phone'],
            'password' => 'required'
        ]);

        User::create([
            'name' => $formFields['name'],
            'email' => $formFields['email'],
            'phone' => $formFields['phone'],
            'password' => Hash::make($request->password)
        ])->assignRole('city_admin');
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $User)
    {
        return view('users.show',[
            'title' => $User->name,
            'user' => $User,
            'authUser' => Auth::user()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $User)
    {
        return view('users.edit', [
            'title' => 'edit city admin',
            'authUser' => Auth::user(),
            'user' => $User
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, User $User)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'required',
            'password' => 'required'
        ]);
        $User->update([
            'full_name' => $formFields['full_name'],
            'email' => $formFields['email'],
            'phone' => $formFields['phone'],
            'password' => Hash::make($request->password)
        ]);
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(User $User)
    {
        $User->delete();
        return redirect('/users');
    }

    public function profile(User $user)
    {
        return view('profile', [
           'authUser' => Auth::user(),
        ]);
    }
}
