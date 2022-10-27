<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $entries = Entry::latest()->paginate(10);
     return response()->json([
        'status' => 200,
        'data' => $entries
     ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('entry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all,[
        // 'id' =>'required',
        'status_id' => 'required',
        'name' => 'required'
    ]);
    if($validator->fails()){
            return response()->json($validator->errors());
        }
        $entries = Entry::create([
            // 'id'=> $request->id,
            'status_id' =>$request->status_id,
            'name' => $request->name
        ]);

        return response()->json([
          'message' => 'created successfully'
        ],200);

         if (response() !== 200) :
            echo "ERRO";
            die();
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Entry $entry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $id)
    {
     return  response()->json([

        'message' => 'deleted successfuly',
        'data'=> $id
     ]);
    }
}
