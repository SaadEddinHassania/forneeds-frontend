<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Age;
use App\Models\Disability;
use App\Models\Gender;
use App\Models\MaritalStatus;
use App\Models\Project;
use App\Models\RefugeeState;
use App\Models\Target;
use App\Models\WorkField;
use App\Models\WorkingState;
use Flash;
use Illuminate\Http\Request;
use DB;

class ProjectsController extends Controller
{

    public function store(Request $request)
    {
        $project = null;
        $input = $request->all();
        DB::transaction(function () use ($input, &$project) {
            $project = Project::create($input);

            if (isset($input['targets'])) {
                foreach ($input['targets'] as $model => $target) {
                    foreach ($target as $t) {
                        Target::firstorcreate([
                            'project_id' => $project->id,
                            'targetable_id' => $t,
                            'targetable_type' => str_replace('-', '\\', $model)
                        ]);
                    }

                }
            }
        });


        Flash::success('Project saved successfully.');

        return ($project !== null) ? response()->json(collect(['id' => $project->id, 'sp_id' => $project->service_provider_id])) : null;
    }
}
