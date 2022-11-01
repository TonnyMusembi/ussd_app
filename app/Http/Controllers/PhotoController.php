<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $photos = Photo::latest()->paginate(10);
    return response()->json([
        "message" => 'successfuly',
        "status" => $photos
    ],200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('photo.create');
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
        'id' =>'required',
        'name' => 'required',
        'url' => 'required|string|confirmed|min:6'
    ]);
    if($validator->fails()){
            return response()->json($validator->errors());
        }

        $photos = Photo::create([
            'id' =>$request->id,
            'name' =>$request->name,
            'url' =>$request->url
        ]);

     return response()->json([
        "message" => 'successful',
        "status" => 'success'
     ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $request -> validate([
            'id' => 'required',
            'url' => 'required',
            'name' => 'required'
        ]);

     return response()->json([
        'message' => 'updated successfullfy',
        'satus' => 200

     ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $photo = Photo::find($id);
    $photo->delete();
    }
}
