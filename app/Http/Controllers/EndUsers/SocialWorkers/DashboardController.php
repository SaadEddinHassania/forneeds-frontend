<?php

namespace App\Http\Controllers\EndUsers\SocialWorkers;

use App\DataTables\CitizensDatatable;
use App\Http\Requests\BenRequest;
use App\Models\AcademicLevel;
use App\Models\Age;
use App\Models\Disability;
use App\Models\Location\Area;
use App\Models\MaritalStatus;
use App\Models\RefugeeState;
use App\Models\Sector;
use App\Models\Users\Citizen;
use App\Models\WorkingState;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class DashboardController extends Controller
{
    /*
     * beneficiaies view from admin panel
     * sign in as button inside datatable
     *
     * submit service request
     *
     * */
    public function index(CitizensDatatable $citizensDatatable)
    {
        return $citizensDatatable->withColumn('action', function ($row) {
            $modelRoute = "endusers.worker";
            $id = $row->user->id;
            return view('endusers.workers.datatables_actions', compact('modelRoute', 'id'));
        })->render('endusers.workers.crud');
    }


    public function loginas( $id)
    {
        session()->set('impersonator', Auth::user()->id);
        Auth::loginUsingId($id);
        return redirect()->route('endusers.ben.index');
    }

    public function logoutas()
    {
        session()->set('impersonator', null);

        Auth::loginUsingId(session('impersonator'));
        return redirect()->route('endusers.worker.index');
    }


    public function createCitizen()
    {
        return view('endusers.workers.forms.create', [
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
    public function storeCitizen(BenRequest $request)
    {
        DB::transaction(function () use ($request) {

            $user = User::create($request->only('user')['user']);
            $citizen = new Citizen($request->except('sector_id', 'area_id', 'user'));
            $citizen->user()->associate($user);

            $citizen->save();
            $citizen->sectors()->attach(array_keys(array_flip($request->get('sector_id'))));
            $citizen->areas()->attach(array_keys(array_flip($request->get('area_id'))));
        }, 5);
        Flash::success('Citizen saved successfully.');

        return redirect()->back();
    }


}
