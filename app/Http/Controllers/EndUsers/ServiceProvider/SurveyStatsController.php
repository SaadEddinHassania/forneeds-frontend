<?php

namespace App\Http\Controllers\EndUsers\ServiceProvider;

use App\Models\Project;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Charts;

class SurveyStatsController extends Controller
{
    public function index()
    {
        $projects = Project::all()->pluck('name', 'id');
        return view('endusers.organizations.surveyStats',compact('projects'));
    }

    public function question_chart(Request $request, $id)
    {
        $question = Question::find($id);
        $chart_dataset = $question->answers->mapWithKeys(function ($v) {
            return [$v->answer => $v->citizens_count()];
        })->toArray();
        $chart = Charts::create('pie')
            ->title('answers pick rate ')
            ->elementLabel("Citizens Count")
            ->labels(array_values(array_keys($chart_dataset)))
            ->values(array_values(array_values($chart_dataset)))
            ->dimensions(1000, 500)
            ->responsive(false)->width(0)->height(300);
        if ($request->isXmlHttpRequest()) {
            return $chart->render();
        }
    }
}
