<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AirLine;
use App\Models\AirPort;
use App\Models\plane;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class AirPortController extends Controller
{
    public function index(Request $request)
    {
//        if (isEmpty($request->all())){
//            return response()->json(['msg' => 'Bad request'], 400);
//        }
        $splitReq = implode(' ', $request->all('code'));

        $first_word = strtok($splitReq," ");
        $count_letters = strlen($first_word);
        if ($count_letters > 2)
        {
            $splitReq = preg_replace('/^(\w{2})/', '$1 ', $splitReq);
        }

        $splitReq = preg_replace( '/\s+/', ' ', $splitReq);

        $splitReq = explode(' ', $splitReq);

        $aircompany = AirLine::where('airline_iata', $splitReq[0])->first();
        $flight_number = $splitReq[1];
        $booking_class = $splitReq[2];
        $data = $splitReq[3];
        $day_of_the_week = [4];
        $airport_out = AirPort::where('airport_iata_code', substr($splitReq[5],0,3))->first();
        $airport_in = AirPort::where('airport_iata_code', substr($splitReq[5],3,3))->first();
        $plane = plane::where('code_iata', $splitReq[9])->first();
        if (!isset($airport_out))
        {
            return response()->json(['message'=>"not found airport_out"],404);
        } else if(!isset($airport_in)) {
            return response()->json(['message'=>"not found airport_in"],404);
        }else if(!isset($plane)) {
            return response()->json(['message' => "not found plane"], 404);
        }else if(!isset($aircompany)) {
            return response()->json(['message' => "not found aircompany"], 404);
        }
        $booking_status = $splitReq[6];
        $splited_Time_departure = explode('+', $splitReq[7]);
        $splited_Time_arrival = explode('+', $splitReq[8]);

        $arrivalDate = '';
        if (count($splited_Time_arrival) > 1) {
            $arrivalDate = substr($data, -5, 2);
            $arrivalMonth = substr($data, -3, 3);
            $arrivalDate = (int)$arrivalDate + 1 . $arrivalMonth;
        } else {
            $arrivalDate = $data;
        }

        $time_departure = substr_replace($splited_Time_departure[0],':',2,0);
        $time_arrival = substr_replace($splited_Time_arrival[0], ':', 2, 0);


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
            'day_arrival' => $arrivalDate,
            'plane'=>$plane->name,
            'food'=>$food,
            'free_places'=>$free_places,

        ];
        return response()->json(['data' => $response]);

    }

    public function converter(Request $request)
    {
//        return response()->json([ => $request->all()]);
    }

}

