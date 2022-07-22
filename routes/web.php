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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);
//pharmacies operations
    Route::get('/pharmacies', [\App\Http\Controllers\PharmacyController::class, 'index']);
    Route::get('/pharmacies/create', [\App\Http\Controllers\PharmacyController::class, 'create']);
    Route::post('/pharmacies', [\App\Http\Controllers\PharmacyController::class, 'store']);
    Route::delete('/pharmacies/{pharmacy}', [\App\Http\Controllers\PharmacyController::class, 'destroy']);


// pharmacie de gard
    Route::get('/pharmacie-de-gard', [\App\Http\Controllers\GuardPharmacyController::class, 'index']);
    Route::get('/pharmacie-de-gard/create', [\App\Http\Controllers\GuardPharmacyController::class, 'create']);
    Route::post('/pharmacie-de-gard', [\App\Http\Controllers\GuardPharmacyController::class, 'store']);
    Route::delete('/pharmacie-de-gard/{guardPharmacy}', [\App\Http\Controllers\GuardPharmacyController::class, 'destroy']);
    //delete all records from table
//    Route::get('/pharmacie-de-gard/delete-all', [\App\Http\Controllers\GuardPharmacyController::class, 'delete']);


//cities operations
    Route::get('/villes', [\App\Http\Controllers\CityController::class, 'index']);
    Route::post('/villes', [\App\Http\Controllers\CityController::class, 'store']);
});



//getting visitor location:
Route::get('/user',[\App\Http\Controllers\UserController::class,'user']);




Route::get('/', [\App\Http\Controllers\SiteController::class, 'fromRoute'])->name('/call.from');
Route::get('/home', [\App\Http\Controllers\SiteController::class, 'index'])->name('/home');





