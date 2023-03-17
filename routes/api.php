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

Route::post('/register', 'AuthController@register');

Route::middleware('auth:api')->post('/airport', function (Request $request) {
    return $request->airport();
});


Route::middleware('auth')->get('/getToken', [TokenController::class, 'generateToken'])->name('generate.token');



Route::post('/airports', [\App\Http\Controllers\API\AirPortController::class, 'index'])->name('airports.api.index');
Route::post('/converter', [\App\Http\Controllers\AirPortController::class, 'converter']);
