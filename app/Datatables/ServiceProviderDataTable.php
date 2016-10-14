<?php

namespace App\DataTables;

use App\Models\ServiceProvider;
use Form;
use Yajra\Datatables\Services\DataTable;

class ServiceProviderDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', function ($row) {
                $model = "admin.serviceProviders";
                $id = $row->id;
                return view('layouts.datatables_actions', compact('model', 'id'));
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
        $serviceProviders = ServiceProvider::with(array('user','sectors'));

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
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'create',
                    'print',
                    'reset',
                    'reload',
                    [
                        'extend' => 'collection',
                        'text' => '<i class="fa fa-download"></i> Export',
                        'buttons' => [
                            'csv',
                            'excel',
                            'pdf',
                        ],
                    ]
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
            'name' => ['title'=>'Name','name' => 'user.name', 'data' => 'name'],
            'mission_statement' => ['name' => 'mission_statement', 'data' => 'mission_statement'],
            'user_id' => ['name' => 'user_id', 'data' => 'user_id'],
            'service_provider_type_id' => ['name' => 'service_provider_type_id', 'data' => 'service_provider_type_id'],
            'sectors' => ['title'=>'Sectors','name' => 'sectors', 'data' => 'sectors'],
            'deleted_at' => ['name' => 'deleted_at', 'data' => 'deleted_at'],
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
        return 'serviceProviders';
    }
}
