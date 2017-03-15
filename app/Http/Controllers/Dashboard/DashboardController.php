<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Survey;
use App\Models\Users\Citizen;
use App\Models\Users\Company;
use App\Models\Users\SocialWorker;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard', [
            'beneficiaries_count' => Citizen::count(),
            'companies_count' => Company::count(),
            'projects_count' => Project::where('expires_at', '<', time())->count(),
            'surveys_count' => Survey::count(),
            'workers_count' => SocialWorker::count()

        ]);
    }


    public function show()
    {
        return view('dashboard.user_profile', ['user' => Auth::user()]);
    }
}
