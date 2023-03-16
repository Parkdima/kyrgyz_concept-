<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/client', function (Request $request) {
    return $request->client();
});

Route::middleware('auth:api')->get('/airport', function (Request $request) {
    return $request->airport();
});

Route::get('/air_lines', [\App\Http\Controllers\Auth\AirLineController::class, 'index'])->name('airlines.api.index');
Route::post('air_lines/store', [\App\Http\Controllers\Auth\AirLineController::class, 'store'])->name('air_lines.api.store');
Route::middleware('auth:sanctum')->get('clients', [\App\Http\Controllers\Auth\AirLineController::class, 'index'])->name('air_lines.api.index');
Route::get('/air_lines/show/{air_line}', [\App\Http\Controllers\Auth\AirLineController::class, 'show'])->name('air_lines.api.show');

Route::middleware('auth')->get('/getToken', [TokenController::class, 'generateToken'])->name('generate.token');

Route::post('/air_lines/update/{air_line}', [\App\Http\Controllers\Auth\AirLineController::class, 'update'])->name('air_lines.api.update');

Route::get('/clients', [\App\Http\Controllers\API\ClientController::class, 'index'])->name('clients.api.index');
Route::post('clients/store', [\App\Http\Controllers\API\ClientController::class, 'store'])->name('clients.api.store');

Route::get('/airports', [\App\Http\Controllers\API\AirPortController::class, 'index'])->name('airports.api.index');
Route::post('airports/store', [\App\Http\Controllers\API\AirPortController::class, 'store'])->name('airpoets.api.store');
