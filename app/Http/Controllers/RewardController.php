<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
   {
        $reward = Reward::latest()->paginate(10);
        return response()->json([
            'message' => 'selected successfully',
            'data' => $reward
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reward.create');
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
            'id' => 'required',
            'reward_id' => 'required',
            'reward_name' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $reward  = Reward::create([
            'id' => $request->id,
            'reward_id' =>$request->reward_id,
            'reward_name' => $request->reward_name
        ]);

        return response()->json([
            'message' => 'created successfully',
            'status' => 200

        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function show(Reward $reward)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function edit(Reward $reward)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reward $reward)
    {
        //
        $this->validate($request,[
            'id' => 'required',
            'reward_id' => 'required',
            'reward_name' => 'required'

        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reward $reward)
    {
        $reward  -> delete();
        return response()->json([
        'message'=> 'deleted successfuly'

        ],200);
        //
    }
}
