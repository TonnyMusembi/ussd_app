<?php

namespace App\Http\Controllers;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class FlightController extends Controller
{
    //
    public function index(){
        $flight =Flight::latest()->paginate(10);
        return response()->json([
            'message' => 'selected successfullfy',
            'status' => 200
        ]);

    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'id' => 'required',
            'name' => 'required',
            'airline' => 'required'
        ]);
        if ($validator->fails()){
            return response()->json([
             $validator->errors() ]);
        }
        $flight = Flight::create([
            'id' =>$request->id,
            'name' => $request->name,
            'airline' =>$request->airline

        ]);
        
    }
}
