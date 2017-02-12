<?php

namespace App\Http\Controllers\Dashboard\Workers;

use App\DataTables\SocialWorkerDatatablePending;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HiringController extends Controller
{
    public function index()
    {
        return view('dashboard.workers.hire',['projects'=>Project::all()]);
    }

    public function applicants(SocialWorkerDatatablePending $socialWorkerDatatablePending)
    {
        return $socialWorkerDatatablePending->render('dashboard.workers.applicants');
    }
}
