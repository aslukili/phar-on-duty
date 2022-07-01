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

Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);



//pharmacies operations
Route::get('/pharmacies', [\App\Http\Controllers\PharmacyController::class, 'index']);
Route::get('/pharmacies/create', [\App\Http\Controllers\PharmacyController::class, 'create']);
Route::post('/pharmacies', [\App\Http\Controllers\PharmacyController::class, 'store']);
Route::delete('/pharmacies/{pharmacy}', [\App\Http\Controllers\PharmacyController::class, 'destroy']);



//cities operations
Route::get('/villes', [\App\Http\Controllers\CityController::class, 'index']);
Route::post('/villes', [\App\Http\Controllers\CityController::class, 'store']);

