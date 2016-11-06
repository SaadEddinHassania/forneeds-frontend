<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Flash;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function store(Request $request)
    {
        $input = $request->all();

        $project = Project::create($input);

        Flash::success('Project saved successfully.');

        return response()->json(collect(['id'=>$project->id,'sp_id'=>$project->service_provider_id]));
    }
}
