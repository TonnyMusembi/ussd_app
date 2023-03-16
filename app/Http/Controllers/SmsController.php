<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use AfricasTalking\SDK\AfricasTalking;

class SmsController extends Controller
{
    //
    public function index(Request $request){

         // parse the USSD request
        $sessionId = $request->input('sessionId');
        $phoneNumber = $request->input('phoneNumber');
        $text = $request->input('text');
        $serviceCode = $request->input('serviceCode');

        // your USSD logic goes here
        $response = "CON Welcome to my USSD app\n";
        $response .= "1. Option 1\n";
        $response .= "2. Option 2\n";

        // send the response back to the user
        header('Content-type: text/plain');
        echo $response;


    }

    public function smsCallback(Request $request)
    {
        // parse the USSD response
        $sessionId = $request->input('sessionId');
        $phoneNumber = $request->input('phoneNumber');
        $text = $request->input('text');

        // your USSD callback logic goes here
        Log::info("USSD response from $phoneNumber: $text");
    }

}
