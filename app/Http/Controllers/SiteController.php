<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\GuardPharmacy;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function redirect()
    {
        redirect('/?city=Tanger');
        return $this->index();
    }

    public function index()
    {
        return view('home',[
            'title' => 'pharmcien de guard',
            'pharmacies' => GuardPharmacy::latest()->filter(\request(['city']))->paginate(16),
            'cities' => City::all(),
        ]);
    }
}
