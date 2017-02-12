<?php

namespace App\Http\Controllers\Dashboard\Organizations;

use App\DataTables\ServiceProviderDataTable;
use App\Http\Requests\OrgRequest;
use App\Models\Location\Area;
use App\Models\Sector;
use App\Models\Target;
use App\Models\Users\Company;
use App\Models\Users\ServiceProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use Flash;

class CrudController extends Controller
{
    public function index(ServiceProviderDataTable $serviceProviderDataTable)
    {
        $targets = collect(Target::$types);
        return $serviceProviderDataTable->render('dashboard.organizations.crud', [
            'sectors' => Sector::pluck('name', 'id'),
            'areas' => Area::pluck('name', 'id'),
            'targets' => array_flip($targets->map(function ($key, $val) {
                return str_replace('\\', '-', $key);
            })->toArray()),
        ]);
    }

    public function create()
    {
        return view('dashboard.organizations.forms.create', [
            'sectors' => Sector::pluck('name', 'id'),
            'areas' => Area::pluck('name', 'id'),
            'companies' => Company::pluck('name', 'id'),


        ]);
    }

    public function edit($id)
    {
        $user = ServiceProvider::with('user')->find($id);
        return view('dashboard.organizations.forms.edit', [
            "sp" => $user,
            'user' => $user->user()->first(),
            'sectors' => Sector::pluck('name', 'id'),
            'areas' => Area::pluck('name', 'id'),
            'companies' => Company::pluck('name', 'id'),


        ]);
    }

    public function store(OrgRequest $request)
    {

        DB::transaction(function () use ($request) {

            $user = User::create($request->only('user')['user']);
            $sp = new ServiceProvider($request->except('sector_id', 'area_id', 'user'));
            $sp->user()->associate($user);
            $sp->save();

            $sp->sectors()->attach(array_keys(array_flip($request->get('sector_id'))));
            $sp->areas()->attach(array_keys(array_flip($request->get('area_id'))));
        }, 5);
        Flash::success('User saved successfully.');

        return redirect()->back();
    }



    public function update(OrgRequest $request, $id)
    {

        DB::transaction(function () use ($request, $id) {
            $sp = ServiceProvider::findOrFail($id);
            $sp->update($request->except('sp.sector_id', 'sp.area_id')['sp']);
            $sp->sectors()->sync($request->input()['sp']['sector_id']);
            $sp->save();

            $sp->areas()->sync($request->input()['sp']['area_id']);
            $sp->save();
            $user = $sp->user;
            $user->update($request->all());
            $user->save();
        }, 5);

        Flash::success('User saved successfully.');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $sp = ServiceProvider::find($id);

        if (empty($sp)) {
            Flash::error('User not found');

            return redirect()->back();
        }
        if ($sp->user) {
            $user = $sp->user;
            $user->delete();
        }
        $sp->delete();

        Flash::success('citizen deleted successfully.');

        return redirect()->back();
    }

}
