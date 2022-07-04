<?php

namespace App\Http\Controllers;

use App\Models\GuardPharmacy;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('home',[
            'title' => 'pharmcien de guard',
            'pharmacies' => Pharmacy::all(),

        ]);
    }
}
