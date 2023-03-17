<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $tests =Test::latest()->paginate(10);
     return response()->json([
        'statusCode'=> 200,
        'data' => $tests
     ],200);
    }

    /**xs
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('test.create');
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
            'test_id' => 'required',
            'status'  => 'required',
            'name'  => 'required'
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors());
        }
        $tests = Test::create([
            'test_id' =>$request->test_id,
            'status' => $request->status,
            'name' => $request->name,
        ]);
        return response()->json([
            'message' => 'created successfully',
            'statusCode' => 200,
            'data' =>$tests
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
        return view('test.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
     return view('test.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
      $validator = Validator::make($request->all(),[
        'test_id'=>$request->test_id,
        'status' =>$request->status,
        'name'=>$request->name
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $test->delete();
        return response()->json([
            'message' => 'deleted successfully'

        ]);
    }
}

