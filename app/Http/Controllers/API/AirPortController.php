<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AirLine;
use App\Models\AirPort;
use Illuminate\Http\Request;

class AirPortController extends Controller
{
    public function index(Request $request)
    {
        $splitReq = explode(' ', $request->code);
        $aircompany = AirLine::where('airline_iata', $splitReq[0])->first();


        $response = [
            'aircompany'=>$aircompany->name,
        ];
            return response()->json($response);
    }
    public  function store()
    {
        return response()->json(['airports' => Airport::all()]);
    }
}
