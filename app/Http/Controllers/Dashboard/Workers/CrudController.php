<?php

namespace App\Http\Controllers\Dashboard\Workers;

use App\DataTables\SocialWorkerDataTable;
use App\Http\Requests\WorkRequest;
use App\Models\Age;
use App\Models\Gender;
use App\Models\Location\Area;
use App\Models\Sector;
use App\Models\Users\Company;
use App\Models\Users\SocialWorker;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Flash;
use Storage;

class CrudController extends Controller
{
    public function index(SocialWorkerDataTable $socialWorkerDataTable)
    {
        return $socialWorkerDataTable->render('dashboard.workers.crud');
        //return view();
    }


    public function create()
    {
        return view('dashboard.workers.forms.create', [

            'areas' => Area::pluck('name', 'id'),
            'ages' => Age::pluck('name', 'id'),
            'genders' => Gender::pluck('name', 'id'),

        ]);
    }

    public function edit($id)
    {
        $worker = SocialWorker::find($id);
        $user = $worker->user()->first();
        return view('dashboard.workers.forms.edit', [
            'worker' => $worker,
            'user' => $user,
            'areas' => Area::pluck('name', 'id'),
            'ages' => Age::pluck('name', 'id'),
            'genders' => Gender::pluck('name', 'id'),
        ]);
    }

    public function store(WorkRequest $request)
    {


        DB::transaction(function () use ($request) {
            $user = User::create($request->only('user')['user']);
            $sp = new SocialWorker($request->except('user'));
            $sp->cv = ($request->cv->store('public/cvs'));

            $sp->user()->associate($user);
            $sp->save();
        }, 5);
        Flash::success('User saved successfully.');

        return redirect()->back();
    }

    public function update(WorkRequest $request, $id)
    {

        DB::transaction(function () use ($request, $id) {

            $sp = SocialWorker::findOrFail($id);
            $worker_input = array_filter($request->except('user'));

            if ($request->hasFile('cv')) {
                $worker_input['cv'] = ($request->cv->store('public/cvs'));
            }
            $sp->update($request->except('user'));
            $user = $sp->user;
            $user->update($request->only('user')['user']);
            $user->save();
        }, 5);
        Flash::success('social worker updated successfully.');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $worker = SocialWorker::find($id);

        if (empty($worker)) {
            Flash::error('User not found');

            return redirect()->back();
        }
        if ($worker->user) {
            $user = $worker->user;
            $user->delete();
        }
        $worker->delete();

        Flash::success('social worker deleted successfully.');

        return redirect()->back();
    }
}
