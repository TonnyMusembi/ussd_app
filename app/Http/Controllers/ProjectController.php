<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $project = Project::query();
        if (request('name')) {
            $project->where('name', 'Like', '%' . request('name') . '%');
        }

        return $project->orderBy('id', 'DESC')->paginate(10);
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
        // $request = validator([
        //     'project_id' => 'required',
        //     'name' =>  'required'
        // ]);
        $this ->validate($request,[
           'project_id' => 'required',
           'name' =>  'required'
        ]);
       $project = Project::create($request->all());
       return response()->json([
        'message' => 'Created successfully',
        'status' =>  200
       ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
     return response()->json([

     ]);
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
