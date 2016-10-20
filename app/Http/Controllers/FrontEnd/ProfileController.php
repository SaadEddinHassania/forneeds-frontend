<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use MarginalizedSituations;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['checkUserType:serviceProvider,citizen'])->only('index', 'settings', 'surveys');
        $this->middleware('checkUserType:serviceProvider')->only('dashboard');
        $this->middleware('checkUserType:citizen')->only('serviceRequests');
    }

    public function index()
    {
        $user = Auth::user();
        return $this->serviceProviderProfile();

        if ($user->isServiceProvider()) {
            return $this->serviceProviderProfile();
        } else if ($user->isCitizen()) {
            return $this->citizenProfile();
        }
    }

    private function serviceProviderProfile()
    {
        $user = Auth::user();
        return view('profiles.sp.index', [
            "user" => $user,
            "sp" => $user->serviceProvider()->first(),
            'projects' => Project::where('service_provider_id', $user->serviceProvider()->first()->id, ['id', 'name'])->lists('name', 'id')->toarray(),
            "user_attrs" => $user->getFillable(),
            'marginalizedSituations' => MarginalizedSituations::all()->lists('name', 'id')->toarray(),
            'sectors' => $user->serviceProvider()->first()->sectors()->lists('name', 'id')->toarray(),
        ]);
    }

    private function citizenProfile()
    {
        return view('profiles.citizen.index');
    }

    public function dashboard()
    {
        return 'Dashboard';
    }

    public function serviceRequests()
    {
        return 'service requests';
    }

    public function settings()
    {
        $user = Auth::user();
        return $this->serviceProviderSettings();
        if ($user->isServiceProvider()) {
            return $this->serviceProviderSettings();
        } else if ($user->isCitizen()) {
            return $this->citizenSettings();
        }
    }

    public function surveys()
    {
        $user = Auth::user();
        if ($user->isServiceProvider()) {
            return $this->serviceProviderSurveys();
        } else if ($user->isCitizen()) {
            return $this->citizenSurveys();
        }
    }

    private function serviceProviderSettings()
    {
        return view('profiles.sp.settings');

    }

    private function citizenSettings()
    {
        return view('profiles.citizen.settings');
    }

    private function serviceProviderSurveys()
    {
        return 'service provider Surveys';
    }

    private function citizenSurveys()
    {
        return 'citizen Surveys';
    }

}
