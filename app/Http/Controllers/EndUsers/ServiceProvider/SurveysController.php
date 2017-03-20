<?php

namespace App\Http\Controllers\EndUsers\ServiceProvider;

use App\Http\Requests\SurveyRequest;
use App\Models\Project;
use App\Models\Survey;
use App\Models\Target;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Charts;
use DB;
use Laracasts\Flash\Flash;
class SurveysController extends Controller
{
    public function index($id)
    {
        $survey = Survey::with('project')->find($id);
        $chart = Charts::create('line')->responsive(false)->width(0)->height(300);
        return view('endusers.organizations.surveyQuestions', compact('survey', 'chart'));
    }

    public function create($project_id)
    {
        $project = Project::find($project_id);
        $target_types_m = collect(Target::getMultTypes())->forget(['workfield'])->toArray();

        return view('endusers.organizations.forms.surveys.create', ['project' => $project, 'target_types_m' => $target_types_m]);
    }

    public function edit($id)
    {
        $survey = Survey::with('project')->find($id);
        $target_types_m = collect(Target::getMultTypes())->forget(['workfield'])->toArray();
        return view('endusers.organizations.forms.surveys.edit', compact('survey', 'target_types_m'));
    }

    public function store(SurveyRequest $request)
    {
        $survey = null;
        $input = $request->all();
        DB::transaction(function () use ($input, &$survey) {
            $survey = Survey::create($input);

            if (isset($input['targets'])) {

                foreach ($input['targets'] as $target) {
                    $val = explode('#', $target);
                    Target::updateOrCreate([
                        'project_id' => $input['project_id'],
                        'targetable_id' => $val[1],
                        'targetable_type' => $val[0]
                    ]);
                }
                if (isset($input['social_worker_id'])) {

                    $survey->SocialWorkers()->sync(array_values($input['social_worker_id']));
                }
            }

        });
        if (($survey !== null)) {
            Flash::success('Survey saved successfully.');
            return redirect()->back();
        } else {
            Flash::error('something went wrong.');

            return redirect()->back();
        }
    }

    public function update(SurveyRequest $request, $id)
    {
        $survey = null;
        $input = $request->all();
      //  dd($input);
        DB::transaction(function () use ($input, &$survey, $id) {
            $survey = Survey::find($id);

             $survey->update($input);

            if (isset($input['targets'])) {

                foreach ($input['targets'] as $target) {
                    $val = explode('#', $target);
                    Target::updateOrCreate([
                        'project_id' => $input['project_id'],
                        'targetable_id' => $val[1],
                        'targetable_type' => $val[0]
                    ]);
                }
            }

            if (isset($input['social_worker_id'])) {

                $survey->SocialWorkers()->sync(array_values($input['social_worker_id']));
            }

        });
        if (($survey !== null)) {
            Flash::success('Survey saved successfully.');
            return redirect()->back();
        } else {
            Flash::error('something went wrong.');

            return redirect()->back();
        }
    }

    public function delete($id)
    {
        if (Survey::find($id)->delete()) {
            Flash::success('Survey deleted successfully.');
        }
        return redirect()->back();
    }
}
