<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $transaction = Transaction::latest()->paginate(10);
        return response()->json([
            'message' => 'successfully selected',
            'data' => $transaction
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'transaction_id'=> 'required',
            'msisdn' =>'required',
            'amount' => 'amount',
            'name' =>  'name'
        ]);
         if($validator->fails()){
            return response()->json($validator->errors());
        }
        $transaction = Transaction::create($request,[
            'transaction_id'=>$request->id,
            'msisdn' =>$request->msisdn,
            'amount' => $request->amount,
            'name'=>$request->name

        ]);
        return response()->json([
            'message' => 'created successfully',
            'status' => 200
            
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction , $id)
    {
        $transaction = Transaction::find($id);
        if(is_null($transaction)){
            return response()->json([
                'message' => 'no data found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('edit.transaction');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
