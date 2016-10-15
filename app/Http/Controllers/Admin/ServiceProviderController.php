<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServiceProviderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Sector;
use App\Models\Users\Beneficiary;
use App\Models\Users\ServiceProvider;
use App\Models\Users\ServiceProviderType;
use App\User;
use Illuminate\Http\Request;
use Response;
use Laracasts\Flash\Flash;

class ServiceProviderController extends Controller
{
    
    /**
     * Display a listing of the ServiceProvider.
     *
     * @param ServiceProviderDataTable $serviceProviderDataTable
     * @return Response
     */
    public function index(ServiceProviderDataTable $serviceProviderDataTable)
    {
        return $serviceProviderDataTable->render('admin.serviceProviders.index');
    }

    /**
     * Show the form for creating a new ServiceProvider.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.serviceProviders.create', [
            'sectors' => Sector::pluck('name', 'id')->toarray(),
            'beneficiaries' => Beneficiary::pluck('name', 'id')->toarray(),
            'users' => User::pluck('name', 'id')->toarray(),
            'serviceProviderTypes' => ServiceProviderType::pluck('name', 'id')->toarray(),
        ]);
    }

    /**
     * Store a newly created ServiceProvider in storage.
     *
     * @param CreateServiceProviderRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $inputWithoutSector = $input;
        unset($inputWithoutSector['sector_id']);
        unset($inputWithoutSector['beneficiary_id']);
        $serviceProvider = ServiceProvicer::create($inputWithoutSector);
        $serviceProvider->sectors()->attach($input['sector_id']);
        $serviceProvider->beneficiaries()->attach($input['beneficiary_id']);

        Flash::success('ServiceProvider saved successfully.');

        return redirect(route('admin.serviceProviders.index'));
    }

    /**
     * Display the specified ServiceProvider.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceProvider = ServiceProvider::find($id);

        if (empty($serviceProvider)) {
            Flash::error('ServiceProvider not found');

            return redirect(route('admin.serviceProviders.index'));
        }

        return view('admin.serviceProviders.show')->with('serviceProvider', $serviceProvider);
    }

    /**
     * Show the form for editing the specified ServiceProvider.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceProvider = ServiceProvider::find($id);

        if (empty($serviceProvider)) {
            Flash::error('ServiceProvider not found');

            return redirect(route('admin.serviceProviders.index'));
        }

        return view('admin.serviceProviders.edit')->with('serviceProvider', $serviceProvider);
    }

    /**
     * Update the specified ServiceProvider in storage.
     *
     * @param  int $id
     * @param UpdateServiceProviderRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $serviceProvider = ServiceProvider::find($id);

        if (empty($serviceProvider)) {
            Flash::error('ServiceProvider not found');

            return redirect(route('admin.serviceProviders.index'));
        }

        $serviceProvider = $serviceProvider->update($request->all());

        Flash::success('ServiceProvider updated successfully.');

        return redirect(route('admin.serviceProviders.index'));
    }

    /**
     * Remove the specified ServiceProvider from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceProvider = ServiceProvider::find($id);

        if (empty($serviceProvider)) {
            Flash::error('ServiceProvider not found');

            return redirect(route('admin.serviceProviders.index'));
        }

        $serviceProvider->delete();

        Flash::success('ServiceProvider deleted successfully.');

        return redirect(route('admin.serviceProviders.index'));
    }
}
