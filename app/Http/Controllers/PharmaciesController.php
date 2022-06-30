<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PharmaciesController extends Controller
{
    public function index()
    {
        return view('pharmacies.index',['title'=> 'pharmacies']);
    }
}
