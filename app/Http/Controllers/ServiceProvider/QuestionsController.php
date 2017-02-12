<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    public function index($survey_id)
    {
        $questions = Question::where('survey_id', $survey_id)->select(array('id', 'subject'))->get();
        return view('organizations.survey-questions', compact('questions'));
    }

    public function create($survey_id)
    {
        return view('organizations.forms.survey', compact('survey_id'));
    }
}
