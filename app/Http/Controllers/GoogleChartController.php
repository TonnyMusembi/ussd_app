<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use DB;
use Illuminate\Support\Facades\DB;



class GoogleChartController extends Controller
{
    //
    public function index(){
        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"));
                    // ->get();
                    // ->pluck('count', 'month_name');

        return view('chart', compact('users'));

    }
    public function store( Request $request ){

    }
    public function  destroy($id){

    }

}
