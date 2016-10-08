<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['checkUserType:serviceProvider,citizen'])->only('index', 'settings','surveys');
        $this->middleware('checkUserType:serviceProvider')->only('dashboard');
        $this->middleware('checkUserType:citizen')->only('serviceRequests');
    }

    public function index()
    {
        $user = Auth::user();
        if ($user->isServiceProvider()) {
            return $this->serviceProviderProfile();
        } else if ($user->isCitizen()) {
            return $this->citizenProfile();
        }
    }

    private function serviceProviderProfile()
    {
        return 'service provider Profile page';
    }

    private function citizenProfile()
    {
        return 'citizen Profile page';
    }

    public function dashboard(){
        return 'Dashboard';
    }

    public function serviceRequests(){
        return 'service requests';
    }

    public function settings()
    {
        $user = Auth::user();
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
        return 'service provider settings';
    }

    private function citizenSettings()
    {
        return 'citizen settings';
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
