<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//auth system
Route::get('/login', function (){
    return view('auth.login');
});

Route::get('/register', function (){
    return view('auth.register');
});


Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'register'])->name('register');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/logout', function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/login');
});

Route::group(['middleware' => 'auth'],function () {
    Route::get('/profile', [\App\Http\Controllers\UserController::class, 'profile']);
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

//users
    Route::resource('/users',\App\Http\Controllers\UserController::class)->middleware('is_admin');

//cities
    Route::resource('/cities', \App\Http\Controllers\CityController::class)->middleware('is_admin');


//pharmacies operations
    Route::get('/pharmacies', [\App\Http\Controllers\PharmacyController::class, 'index'])->name('pharmacies');
    Route::get('/pharmacies/create', [\App\Http\Controllers\PharmacyController::class, 'create']);
    Route::post('/pharmacies', [\App\Http\Controllers\PharmacyController::class, 'store']);
    Route::delete('/pharmacies/{pharmacy}', [\App\Http\Controllers\PharmacyController::class, 'destroy']);
    Route::get('/pharmacies/{pharmacy}/edit', [\App\Http\Controllers\PharmacyController::class, 'edit']);
    Route::put('/pharmacies/{pharmacy}', [\App\Http\Controllers\PharmacyController::class, 'update']);


// pharmacie de gard
    Route::get('/pharmacie-de-gard', [\App\Http\Controllers\GuardPharmacyController::class, 'index']);
    Route::get('/pharmacie-de-gard/create', [\App\Http\Controllers\GuardPharmacyController::class, 'create']);
    Route::post('/pharmacie-de-gard', [\App\Http\Controllers\GuardPharmacyController::class, 'store']);
    Route::delete('/pharmacie-de-gard/{guardPharmacy}', [\App\Http\Controllers\GuardPharmacyController::class, 'destroy']);
    //delete all records from table
    Route::get('/pharmacie-de-gard/delete-all', [\App\Http\Controllers\GuardPharmacyController::class, 'delete']);
});


//getting visitor location:
//Route::get('/user',[\App\Http\Controllers\UserLocationController::class,'user']);


Route::get('/', [\App\Http\Controllers\SiteController::class, 'fromRoute'])->name('/call.from');
Route::get('/home', [\App\Http\Controllers\SiteController::class, 'index'])->name('/home');






