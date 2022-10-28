<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Validated;

class RegisterUserController extends Controller
{
    //
    public function index(){

    }
    public function create(){
        return view('registration.create');

    }
    public function store(Request $request){
        $validator =Validator::make($request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::create(request(['name', 'email', 'password']));

        auth()->login($user);

        return redirect()->to('/games');

    }
    public function show (){
        return response()->json([
            'message' => 'successfully shown'
    ]);

    }

    public function destroy($id){
        $id ->delete();
        return response()->json([
            'message' => 'deleted successfuly',
            'status' => 'success'

        ],200 );
    }
}
