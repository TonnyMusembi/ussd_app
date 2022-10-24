<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class GoogleChartController extends Controller
{
    //
    public function index(){
        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                     ->orderBy(DB::raw("MONTH(created_at)"), 'ASC');
                    // ->pluck('count', 'month_name')->all();

        return view('chart', compact('users'));

    }
    public function store( Request $request ){

    }
    public function  destroy($id){
        return response()->json([
            'message' => 'deleted successfully',
            'data' => '$id'
        ]);


    }

}
