<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProjectDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Repositories\AreaRepository;
use App\Repositories\MarginalizedSituationRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\SectorRepository;
use App\Repositories\ServiceProviderRepository;
use App\Models\District;
use Flash;
use Response;

class ProjectController extends Controller
{
    /**
     * Display a listing of the Project.
     *
     * @param ProjectDataTable $projectDataTable
     * @return Response
     */
    public function index()
    {
        return "project index";
    }

    /**
     * Show the form for creating a new Project.
     *
     * @return Response
     */
    public
    function create()
    {
        return view('admin.projects.create', [
            'sectors' => $this->sectorRepository->all()->lists('name', 'id')->toarray(),
            'serviceProviders' => $this->serviceProviderRepository->all()->lists('name', 'id')->toarray(),
            'marginalizedSituations' => $this->marginalizedSituationRepository->all()->lists('name', 'id')->toarray(),
            'areas' => $this->areaRepository->all()->lists('name', 'id')->toarray()
        ]);
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param CreateProjectRequest $request
     *
     * @return Response
     */
    public
    function store(CreateProjectRequest $request)
    {
        $input = $request->all();
        $st = District::find($input['district_id']);
        $input['location_meta_id'] = $st->location_meta_id;

        $project = $this->projectRepository->create($input);

        Flash::success('Project saved successfully.');

        return redirect(route('admin.projects.index'));
    }

    /**
     * Display the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public
    function show($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('admin.projects.index'));
        }

        return view('admin.projects.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public
    function edit($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('admin.projects.index'));
        }

        return view('admin.projects.edit')->with('project', $project);
    }

    /**
     * Update the specified Project in storage.
     *
     * @param  int $id
     * @param UpdateProjectRequest $request
     *
     * @return Response
     */
    public
    function update($id, UpdateProjectRequest $request)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('admin.projects.index'));
        }

        $project = $this->projectRepository->update($request->all(), $id);

        Flash::success('Project updated successfully.');

        return redirect(route('admin.projects.index'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public
    function destroy($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('admin.projects.index'));
        }

        $this->projectRepository->delete($id);

        Flash::success('Project deleted successfully.');

        return redirect(route('admin.projects.index'));
    }
}
