<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Age;
use App\Models\Disability;
use App\Models\Gender;
use App\Models\Location\Area;
use App\Models\MaritalStatus;
use App\Models\Project;
use App\Models\RefugeeState;
use App\Models\Survey;
use App\Models\WorkField;
use App\Models\WorkingState;
use function response;

class AjaxApiController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cities($area_id)
    {
        $cities = $this->cityRepository->findByField('area_id', $area_id, array('id', 'name'));
        return response()->json($cities);
    }

    public function districts($city_id)
    {
        $districts = $this->districtRepository->findByField('city_id', $city_id, array('id', 'name'));
        return response()->json($districts);
    }

    public function streets($district_id)
    {
        $streets = $this->streetRepository->findByField('district_id', $district_id, array('id', 'name'));
        return response()->json($streets);
    }

    public function serviceTypes($sector_id)
    {
        $serviceTypes = $this->serviceTypeRepository->findByField('sector_id', $sector_id, array('id', 'name'));
        return response()->json($serviceTypes);
    }

    public function projects($service_provider_id)
    {

        $projects = Project::where('service_provider_id', $service_provider_id)->select(array('id', 'name'))->get();
        return response()->json($projects);
    }

    public function projectsWithAreas()
    {
        $projects = Project::with('area')->get()->map(function ($v) {
            if ($v->area)
                return ['name' => $v->name,
                    'lat' => $v->area->lat,
                    'lng' => $v->area->lng];
        })->filter();
        return response()->json($projects);
    }

    public function surveys($project_id)
    {
        $surveys = Survey::where('project_id', $project_id)->select(array('id', 'subject'))->get();
        return response()->json($surveys);
    }

    public function questions($survey_id)
    {
        $questions = $this->questionRepository->findByField('survey_id', $survey_id, array('id', 'body'));
        return response()->json($questions);
    }

    public function Listings($lookup)
    {
        return response()->json(str_replace('-', '\\', $lookup)::all()->pluck('name', 'id'));
    }

    public function questionChart($question_id)
    {

    }
}
