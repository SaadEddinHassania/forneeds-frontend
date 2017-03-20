<?php

namespace App\Http\Controllers\EndUsers\Citizens;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('endusers.citizens.index', [
            "user" => $user,
            'projects' => Project::with('area')->get(),
            'surveys' => $user->citizen->applicable_surveys()->orderBy('created_at', 'desc')->get()
        ]);
    }
}
