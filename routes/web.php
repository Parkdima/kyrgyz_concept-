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

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'air_lines' => \App\Http\Controllers\Auth\AirLineController::class,
    'air_ports' => \App\Http\Controllers\AirPortController::class,
    'countries' => \App\Http\Controllers\CountryController::class,
    'planes' => \App\Http\Controllers\PlaneController::class,
    'states' => \App\Http\Controllers\StateController::class,
]);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
