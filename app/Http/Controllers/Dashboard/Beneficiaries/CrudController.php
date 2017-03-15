<?php

namespace App\Http\Controllers\Dashboard\Beneficiaries;

use App\DataTables\CitizensDatatable;
use App\Http\Controllers\Controller;
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
use Illuminate\Support\Facades\Auth;
use Flash;
use DB;
class CrudController extends Controller
{
    public function index(CitizensDatatable $citizensDatatable)
    {
        return $citizensDatatable->render('dashboard.beneficiaries.crud');
    }

    public function create()
    {
        return view('dashboard.beneficiaries.forms.create', [
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

    public function edit($id)
    {
        $user = Citizen::with('user')->find($id);
        return view('dashboard.beneficiaries.forms.edit', [
            "user" => $user->user()->first(),
            'citizen' => $user,
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

    public function store(BenRequest $request)
    {
        DB::transaction(function () use ($request) {

            $user = User::create($request->only('user')['user']);
            $citizen = new Citizen($request->except('sector_id', 'area_id', 'user'));
            $citizen->user()->associate($user);
            dump(1);

            $citizen->save();
            $citizen->sectors()->attach(array_keys(array_flip($request->get('sector_id'))));
            $citizen->areas()->attach(array_keys(array_flip($request->get('area_id'))));
        }, 5);
        Flash::success('User saved successfully.');

        return redirect()->back();
    }

    public function update(BenRequest $request, $id)
    {
        $citizen = Citizen::findOrFail($id);
        $citizen->update($request->except('citizen.sector_id', 'citizen.area_id')['citizen']);
        $citizen->sectors()->sync($request->input()['citizen']['sector_id']);
        $citizen->save();
        $citizen->areas()->sync($request->input()['citizen']['area_id']);
        $citizen->save();
        $user = $citizen->user;
        $user->update($request->all());
        $user->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $citizen = Citizen::find($id);

        if (empty($citizen)) {
            Flash::error('User not found');

            return redirect()->back();
        }
        if ($citizen->user) {
            $user = $citizen->user;
            $user->delete();
        }
        $citizen->delete();

        Flash::success('citizen deleted successfully.');

        return redirect()->back();
    }


}
