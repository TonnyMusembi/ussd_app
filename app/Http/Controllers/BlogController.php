<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
class BlogController extends Controller
{
    //

    public function index(){
        return view('index');

    }
    public function store(Request $request){
        $validator = $this->validate($request, [
          'title' => 'required|exists:blogs,created_at'
       ]);
       if($validator) {
          Blog::create($request->all());
       }

       return back()->with('success', 'Blog created.');

    }
}
