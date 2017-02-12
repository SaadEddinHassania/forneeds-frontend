<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Requests\LookUpRequest;
use App\Models\Project;
use App\Models\Sector;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('organization.projects', [
            'projects' => Project::all()->pluck('name', 'id')
        ]);
    }

    public function create()
    {
        return view('organization.forms.project', [
            'sectors' => Sector::all()->pluck('name', 'id')
        ]);
    }

    public function edit()
    {
        return view('organization.forms.edit-project', [
            'sectors' => Sector::all()->pluck('name', 'id')
        ]);
    }

    public function update(LookUpRequest $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->update($request->all());
        Flash::success('Project updated successfully.');

        return redirect()->back();
    }

    public function store(LookUpRequest $request)
    {
        $input = $request->all();
        $input['service_provider_id'] = \Auth::user()->serviceProvider();
        Project::create($input);
        Flash::success('Project saved successfully.');

        return redirect()->back();
    }

    public function delete($id)
    {
        $project = Project::find($id);
        $project->delete();
        Flash::success('Project saved successfully.');

        return redirect()->back();

    }

}
