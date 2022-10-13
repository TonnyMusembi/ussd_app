<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UssdController extends Controller
{
    //
    public static function session(Request $request)
    {
        //$request->all();
        $text=$request->input('text');
        $session_id = $request->input('sessionId');
        $phone_number = $request->input('phoneNumber');
        $service_code = $request->input('serviceCode');
        $network_code = $request->input('networkCode');
        $level = explode("*", $text);
        //if (isset($text)) {

        if ( $text == "" ) {
            $response="CON Welcome Tonny \n";
            $response .= "1. Account Bal\n";
            $response .= "2. Transfer \n";
            $response .= "3. Airtime Recharge \n";
            $response .= "0. Exit";
        }
        if(isset($level[0]) && $level[0] == 1 && !isset($level[1]))
        {
            $response="END Your account Bal: \n";
            $response .=" #50,000.00 \n";
        }
        if(isset($level[0]) && $level[0] == 2 && !isset($level[1]))
        {
            $response="CON Select Bank \n";
            $response .="1. GTB\n";
            $response .="2. First Bank \n";
            $response .="3. Access Bank \n";
            $response .="4. FCMB \n";
            $response .= "0. back";
        }
        if(isset($level[0]) && $level[0] == 2  && isset($level[1]) && !isset($level[2]))
        {
            $response="CON enter Acct. No.\n";

        }
        if(isset($level[0]) && $level[0] == 2  && isset($level[1])  && isset($level[2]))
        {

            $response="END Transaction Successful \n";
            $response .="thanks for patronage \n";

        }
            header('Content-type: text/plain');
            echo $response;
        //}
    }
}
