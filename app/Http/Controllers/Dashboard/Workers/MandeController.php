<?php

namespace App\Http\Controllers\Dashboard\Workers;

use App\DataTables\SurveysWorkersDatatable;
use App\Models\Project;
use App\Models\Survey;
use App\Models\Users\ServiceProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MandeController extends Controller
{
    public function index()
    {

        return view('dashboard.workers.mande', [
            'service_providers' => ServiceProvider::with(['projects' => function ($query) {
                $query->with('surveys');
            }])->get()
        ]);
    }

    public function survery_workers($id, SurveysWorkersDatatable $surveysWorkersDatatable)
    {
        $survey = Survey::find($id);
        $project = Project::find($survey->project_id);
        $sp = ServiceProvider::find($project->service_provider_id);
        return $surveysWorkersDatatable->render('dashboard.workers.surveryworkers', [
            'survey' => $survey,
            'project' => $project,
            'sp' => $sp
        ]);
    }

    public function make_payment()
    {
        return view('dashboard.workers.forms.payment');
    }

    public function store_payment()
    {

    }


}
