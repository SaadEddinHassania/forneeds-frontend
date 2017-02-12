<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Models\Survey;
use App\Models\Users\SocialWorker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurveysController extends Controller
{
    public function index($project_id)
    {
        $surveys = Survey::where('project_id', $project_id)->select(array('id', 'subject'))->get();
        return view('organizations.project-surveys', compact('surveys'));
    }

    public function create($project_id)
    {
        $workers = SocialWorker::all()->pluck('name', 'id');
        return view('organizations.forms.survey', compact('project_id', 'workers'));
    }

    public function store()
    {

    }

}
