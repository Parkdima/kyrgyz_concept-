<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AirLine;
use App\Models\AirPort;
use App\Models\plane;
use Illuminate\Http\Request;

class AirPortController extends Controller
{
    public function index(Request $request)
    {
        $splitReq = explode(' ', $request->code);
        $aircompany = AirLine::where('airline_iata', $splitReq[0])->first();
        $flight_number = $splitReq[1];
        $booking_class = $splitReq[2];
        $data = $splitReq[3];
        $day_of_the_week = [4];
        $airport_out = AirPort::where('airport_iata_code', substr($splitReq[5],0,3))->first();
        $airport_in = AirPort::where('airport_iata_code', substr($splitReq[5],3,3))->first();
        $booking_status = $splitReq[6];
        $splited_Time_departure = explode('+', $splitReq[7]);
        $splited_Time_arrival = explode('+', $splitReq[8]);
        $time_departure = substr_replace($splited_Time_departure[0],':',2,0);
        $time_arrival = substr_replace($splited_Time_arrival[0], ':', 2, 0);
        $plane = plane::where('code_iata', $splitReq[9])->first();
        $food = $splitReq[10];
        $free_places = $splitReq[11];
        $response = [
            'aircompany'=>$aircompany->name,
            'flight_number'=>$flight_number,
            'booking_class'=>$booking_class,
            'data'=>$data,
            'day_of_the_week'=>$day_of_the_week,
            'airport_out'=>$airport_out->name,
            'airport_in'=>$airport_in->name,
            'booking_status'=>$booking_status,
            'time_departure'=>$time_departure,
            'time_arrival' => $time_arrival,
            'day_arrival' => $splited_Time_arrival[1],
            'plane'=>$plane->name,
            'food'=>$food,
            'free_places'=>$free_places,

        ];
            return response()->json($response);


    }

}
