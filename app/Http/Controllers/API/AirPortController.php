<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AirPort;
use Illuminate\Http\Request;

class AirPortController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'airport_iata_code' => $request->airport_iata_code,
            'iso2' => $request->iso2

        ]);
    }

    public  function store()
    {
        return response()->json(['airports' => Airport::all()]);
    }
}
