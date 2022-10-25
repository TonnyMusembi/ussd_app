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

    public function update(Request $request ,Blog $blog){
        $request -> validate([
            'title' => 'required'
        ]);
        $blog-> title = $request->get('title');
        $blog -> save();

      return redirect('/Blog/index/')->with('success', 'Blog updated!');
    }
    public function destroy($id){
        return response()->json([
            'message' => 'deleted successfully',
            'data' => $id
        ]);

    }
}
