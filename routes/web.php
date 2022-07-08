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

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);

Route::get('/', [\App\Http\Controllers\SiteController::class, 'redirect']);
//Route::view('/', '/home', ['city' => 'Tanger']);


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


//cities operations
Route::get('/villes', [\App\Http\Controllers\CityController::class, 'index']);
Route::post('/villes', [\App\Http\Controllers\CityController::class, 'store']);

