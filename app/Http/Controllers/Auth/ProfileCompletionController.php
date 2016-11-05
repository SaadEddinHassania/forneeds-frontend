<?php

namespace App\Http\Controllers\Auth;

use App\Models\AcademicLevel;
use App\Models\Age;
use App\Models\Disability;
use App\Models\Location\Area;
use App\Models\MaritalStatus;
use App\Models\RefugeeState;
use App\Models\Sector;
use App\Models\Users\Citizen;
use App\Models\Users\Company;
use App\Models\Users\ServiceProvider;
use App\Models\WorkingState;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;

class ProfileCompletionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'noUserType']);
        dump('checkpoint');
    }

    public function index()
    {
        return view('auth.choose');
    }

    public function choosePath($type)
    {
        $func = 'choose' . ucfirst($type);
        return $this->$func();
    }

    private function chooseCitizen()
    {

        return view('profiles.citizen.complete', [
            'sectors' => Sector::pluck('name', 'id'),
            'maritals' => MaritalStatus::pluck('name', 'id'),
            'ages' => Age::pluck('name', 'id'),
            'areas' => Area::pluck('name', 'id'),
            'workingstates' => WorkingState::pluck('name', 'id'),
            'refugee' => RefugeeState::pluck('name', 'id'),
            'disabilities' => Disability::pluck('name', 'id'),
            'academic' => AcademicLevel::pluck('name', 'id'),

        ]);
    }

    private function chooseSp()
    {

        return view('profiles.sp.complete', [
            'sectors' => Sector::pluck('name', 'id'),
            'companies' => Company::pluck('name', 'id'),
            'areas' => Area::pluck('name', 'id')
        ]);

    }

    public function completeCitizenProfile(Request $request)
    {
        $citizen = new Citizen($request->except(['area_id', 'sector_id']));
        $citizen->user()->associate(Auth::user());
        $citizen->save();
        $citizen->sectors()->attach(array_filter($request->get('sector_id')));
        $citizen->areas()->attach(array_filter($request->get('area_id')));
        return redirect()->route('profile');
    }

    public function completeSpProfile(Request $request)
    {
        $sp = new ServiceProvider($request->except(['area_id', 'sector_id']));
        $sp->user()->associate(Auth::user());
        $sp->save();
        $sp->sectors()->attach(array_filter($request->get('sector_id')));
        $sp->areas()->attach(array_filter($request->get('area_id')));
        return redirect()->route('profile');
    }
}
