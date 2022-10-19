<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    //
    public function index(){

    }
    public function destory($users){
        $users ->delete();
        return response()->json(["message" => 'Deleted successfuly',
    "status" => 'success']);


    }
}
