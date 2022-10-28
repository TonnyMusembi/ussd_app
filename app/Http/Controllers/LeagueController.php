<?php

namespace App\Http\Controllers;

use App\Models\League;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leagues = League::latest()->paginate(10);
        return response()->json([
            "status" => 200,
            "data" => $leagues
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('league.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(),[
            'league_id' => 'required',
            'name' => 'required',
            'country' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $leagues = League::create([
            'league_id' =>$request->league_id,
            'name'=> $request->name,
            'country'=>$request->country
        ]);
        return [
            'message' => 'created successfulfy',
            "status" => 200,

        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\League  $league
     * @return \Illuminate\Http\Response
     */
    public function show(League $league)
    {
        //
    }
    public function select(){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\League  $league
     * @return \Illuminate\Http\Response
     */
    public function edit(League $league)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\League  $league
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, League $league)
    {
        //
        $validator = Validator::make($request->all(),[


    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\League  $league
     * @return \Illuminate\Http\Response
     */
    public function destroy(League $league,$id)
    {
        //

        $league = League::where('id',$id)->delete();
    // dd($data);
    if($league > 0 ){

        return response()->json(['message'=>'Successfully Deleted']);
    }
    else{
        return response()->json(['message'=>'Delete Failed']);
    }
        // $league->delete();
        // return response()->json('deleted successfully');

    }
}
