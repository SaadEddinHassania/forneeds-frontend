<?php

namespace App\Http\Controllers\Surveys;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Project;
use App\Models\Question;
use App\Models\Survey;
use App\Models\Users\ServiceProvider;
use App\User;
use Flash;
use Illuminate\Http\Request;
use Response;


class SurveysController extends Controller
{
    public function create()
    {

        return view("surveys.complete", [
            'projects' => Project::all()->pluck('name', 'id')->toarray(),
            'serviceProviders' => ServiceProvider::all()->pluck('name', 'id')->toarray(),
            'surveys' => Survey::all()->pluck('subject', 'id')->toarray(),
//            "user_attrs" => User::getFieldsSearchable()

        ]);
    }

    public function storeSurvey(Request $request)
    {
        $input = $request->all();
        $survey = Survey::create($input);
        Flash::success('Survey saved successfully.');
        return response()->json(collect(["id" => $survey->id]));
    }

    public function storeQuestions(Request $request)
    {
        $input = $request->all();
        $question = Question::create($input);
        $input['answer'] = array_filter($input['answer']);
        $input['order'] = array_filter($input['order']);

        foreach ($input['answer'] as $key => $val) {
            Answer::create(
                array(
                    "question_id" => $question->id,
                    "order" => (isset($input['order'][$key])) ? $input['order'][$key] : 1,
                    "answer" => $input['answer'][$key]
                ));
        }
        Flash::success('Survey saved successfully.');
        return response()->json(collect(["id" => $question->id]));
    }


}
