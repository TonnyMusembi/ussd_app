<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::latest()->paginate(10);
         return response()->json([
              "status" => 200,
            "data" => $student
        ]);
        return view('index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
     return view('student.create');
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
            'name' => 'required',
            'phone' =>'required',
            'email' =>'required',
            'password' => 'required'
            // 'country' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $students = Student::create([
            'id'=>$request->id,
            'name'=>$request->name,
            'phone' =>$request->phone,
            'email' =>$request->email,
            'password' =>$request->password
        ]);

        return response()->json([
            'message' => 'created successfully',
            'status' =>  200
        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student,$id)
    {
       $student = Student::find($id);
        if (is_null($student)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([($student)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request ->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required'

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
      return response()->json([
        'message' => 'deleted successfully',
      ]);
    }
}
