<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Models\Project;
use App\Models\Survey;
use App\Models\Users\Citizen;
use App\Models\Users\ServiceProvider;
use App\Models\Users\SocialWorker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
class ProfileController extends Controller
{
    public function index()
    {
        return view('organization.index', [
            'ben_count' => Citizen::count(),
            'org_count' => ServiceProvider::count(),
            'survey_count' => Survey::count(),
            'workers_count' => SocialWorker::count(),
            'active_projects' => Project::whereDate('expires_at', '>=', Carbon::today()->toDateString())->count()
        ]);

    }
}
