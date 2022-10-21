<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Dotenv\Parser\Value;
use GuzzleHttp\Middleware;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class Authcontroller extends Controller
{
    public function __construct() {
        $this->middleware('auth:api',['expect'=>['login','register']]);

    }
public function register(Request $request){
    $validator = Validator::make($request->all,[
        'mame' =>'required',
        'email' => 'required',
        'password' => 'required|string|confirmed|min:6'
    ]);
    if ($validator->fails()){
      return $this->sendError($validator->errors());

    }


}
public function login(Request $request){
$validator = Validator::make($request->all,[]);

}
public function show($id){
    $users = User::find($id);

        if (is_null($users)) {
            return $this->sendError('Product not found.');
        }

}

}
