<?php

namespace App\DataTables;

use App\User;
use Yajra\Datatables\Services\DataTable;
use App\Models\Users\ServiceProvider;
use Form;

class ServiceProviderDataTablePending extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        $request = $this->request();
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', function ($row) {
                $modelRoute = str_replace('\\', '-', ServiceProvider::class);

                $id = $row->id;
                return view('dashboard.organizations.forms.accept-org', compact('modelRoute', 'id'));
            })->addColumn('sectors', function (ServiceProvider $user) {
                return $user->sectors->map(function ($sector) {
                    return str_limit($sector->name, 30, '...');
                })->implode(',');
            })->addColumn('areas', function (ServiceProvider $user) {
                return $user->areas->map(function ($area) {
                    return str_limit($area->name, 30, '...');
                })->implode(',');
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {


        $serviceProviders = ServiceProvider::with(array('user', 'company', 'sectors', 'areas'))->selectRaw('distinct service_providers.*');;

        $serviceProviders->where('is_accepted', false);
        return $this->applyScopes($serviceProviders);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'lBfrtip',
                "bDestroy" => true,

                'buttons' => [

                    'print',
                    'reset',
                    'reload',
                    'export',
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            ['name' => '', 'title' => '', 'data' => null, 'searchable' => false, 'orderable' => false, 'sorting' => 'false', 'width' => '20px', 'className' => 'details-control handCursor', "defaultContent" => '+'],

            'name' => ['title' => 'Name', 'name' => 'user.name', 'data' => 'name'],
            'mission_statement' => ['name' => 'mission_statement', 'data' => 'mission_statement'],
            'sectors' => ['title' => 'Sectors', 'name' => 'sectors.name', 'data' => 'sectors'],
            'areas' => ['title' => 'Areas', 'name' => 'areas.name', 'data' => 'areas'],
            'created_at' => ['name' => 'created_at', 'data' => 'created_at'],
            'updated_at' => ['name' => 'updated_at', 'data' => 'updated_at']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'serviceproviderdatatablependings_' . time();
    }
}
