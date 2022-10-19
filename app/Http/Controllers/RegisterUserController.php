<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterUserController extends Controller
{
    //
    public function index(){

    }
    public function create(){
        return view('registration.create');

    }
    public function store(Request $request){
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::create(request(['name', 'email', 'password']));

        auth()->login($user);

        return redirect()->to('/games');

    }
    public function show (){
        

    }

    public function destroy($id){
        $id ->delete();
        return response()->json([
            'message' => 'deleted successfuly',
            'status' => 'success'

        ],200 );
    }
}
