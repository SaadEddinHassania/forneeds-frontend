<?php

namespace App\DataTables;

use App\Models\Users\ServiceProvider;
use Form;
use Yajra\Datatables\Services\DataTable;

class ServiceProviderDataTable extends DataTable
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
                $modelRoute = "Dashboard.org.crud";
                $id = $row->id;
                return view('dashboard.layout.datatables_actions', compact('modelRoute', 'id'));
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
        $request = $this->request();

        $serviceProviders = ServiceProvider::with(array('user', 'company', 'sectors', 'areas'))->selectRaw('distinct service_providers.*');;
        if ($request->has('name')) {
            $serviceProviders->whereHas('user', function ($u) use ($request) {
                if ($request->has('name') && $name = $request->input('name')) {
                    $u->where('name', $name);
                }
            });
        }

        if ($request->has('area')) {
            $serviceProviders->whereHas('areas', function ($a) use ($request) {
                if ($request->has('area') && $area = $request->input('area')) {
                    $a->where('area_service_provider.area_id', $area);
                }
            });
        }
        if ($request->has('sector')) {
            $serviceProviders->whereHas('sectors', function ($s) use ($request) {
                if ($request->has('sector') && $sector = $request->input('sector')) {
                    $s->where('sector_service_provider.sector_id', $sector);
                }
            });
        }

        if ($request->has('targets')) {
            $serviceProviders->whereHas('projects', function ($p) use ($request) {
                if ($request->has('targets') && $targets = $request->input('targets')) {
                    $p->whereHas('targets', function ($t) use ($request, $targets) {
                        foreach ($targets as $key => $target) {
                            $t->where(function ($query) use ($target, $key) {
                                $query->where('targetable_type', str_replace('-', '\\', ($key)))
                                    ->Where('targetable_id', $target);
                            });
                        }
                    });
                }
            });
        } elseif ($request->has('target')) {
            $serviceProviders->whereHas('projects', function ($p) use ($request) {
                if ($request->has('target') && $target = $request->input('target')) {
                    $p->whereHas('targets', function ($t) use ($request, $target) {
                        $t->where('targetable_type', (str_replace('-', '\\', $target)));
                    });
                }
            });

        }


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
                'scrollX' => false,
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
        return 'serviceProviders';
    }
}
