<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $books = Book::latest()->paginate(10);
          return response()->json([
            "status" => 200,
            "data" => $books
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('books.create');
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
            'book_id' => 'required',
            'status' => 'required',
            'name' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $book = Book::create([
        'book_id' => $request->book_id,
        'status' => $request->status,
        'name' => $request->name
        ]);
    return response()->json(['message' => 'Created successfully'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book){
        return response()->json(

        );
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
       return response()->json([
        'message' => 'deleted successfully',
        'data' => $book
       ]);
    }
}
