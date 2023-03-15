<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::latest()->paginate(10);
        if (request('name')) {
            $project->where('name', 'Like', '%' . request('name') . '%');
        }

        // return $project;
        return response()->json([
            'message' => 'selected successfully',
            'data' => $project
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
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
            'project_id' => 'required',
            'name' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

       $project = Project::create([
        'project_id' => $request->project_id,
        'name' => $request->name

       ]);
     return response()->json([
        'data'=>$project,
       'message'=> 'Program created successfully.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project,$id){
 $project = Project::find($id);
        if (is_null($project)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([($project)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        $project ->validate([
            'project_id' => 'required',
            'name' => 'required'
        ]);
        $project = Project::create($request->all());

        return response()->json([
            'message' => 'created successfully',
         'status' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        return response()->json([
            'message' => 'deleted successfully',

        ]);
    }
}
