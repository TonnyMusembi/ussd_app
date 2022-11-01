<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    //
    public function index(){
        $user = User::latest()->paginate(10);
        return response()->json([
            'message' => ' selected sucessfullfy',
            'status' => 200
        ]);

    }
    public function store(Request $request){
        $validator = Validator::make($request,[
            'id' => 'required',
            'name' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
       $user = User::create($request,[
        'id'=> $request->id,
        'name' =>$request->name,
        'password' =>$request->password
       ]);
       return response()->json([
        'message' => 'created successfully',
        'status' => 200
       ]);


    }
    public function destory($users){
        $users ->delete();
        return response()->json(["message" => 'Deleted successfuly',
    "status" => 'success']);


    }
}
