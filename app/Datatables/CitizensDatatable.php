<?php

namespace App\DataTables;

use App\Models\Users\Citizen;
use Maatwebsite\Excel\Writers\LaravelExcelWriter;
use Yajra\Datatables\Services\DataTable;

class CitizensDatatable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->editColumn('contactable', function ($citizen) {
                return $citizen->contactable ? 'true' : '-';
            })->addColumn('sectors', function (Citizen $user) {
                return $user->sectors->map(function ($sector) {
                    return str_limit($sector->name, 30, '...');
                })->implode(',');
            })->addColumn('areas', function (Citizen $user) {
                return $user->areas->map(function ($area) {
                    return str_limit($area->name, 30, '...');
                })->implode(',');
            })
            ->addColumn('action', function ($row) {
                $modelRoute = "Dashboard.ben.crud";
                $id = $row->id;
                return view('dashboard.layout.datatables_actions', compact('modelRoute', 'id'));
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Citizen::with(array('user', 'academicLevel', 'sectors', 'maritalStatus', 'age', 'areas', 'workingState', 'disability', 'refugeeState',))->selectRaw('distinct citizens.*');;;

        return $this->applyScopes($query);
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
//'initComplete' => "function () {
//                console.log(this.api().columns().every(function(){console.log(this.data().unique())}));
//
//
//                            this.api().columns().every(function () {
//
//                                var column = this;
//                            var select = $('<select />')
//                                    .appendTo(
//                            $(column.footer()).empty()
//                                            )
//                                    .on( 'change', function () {
//                                    column.search($(this).val(), false, false, true).draw();
//
//                                    } );
//                                     column.data()
//
//                                    .unique()
//                                    .each( function ( d ) {
//                                        select.append( $('<option value=\"'+d+'\">'+d+'</option>') );
//                                    } );
//                            });
//                        }",
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    'export',
                ],

            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['name' => '', 'title' => '', 'data' => null, 'searchable' => false, 'orderable' => false, 'sorting' => 'false', 'width' => '20px', 'className' => 'details-control', "defaultContent" => '+'],

            //      ['data' => 'id', 'name' => 'id', 'title' => 'Id', 'searchable' => true],
            ['data' => 'marital_status.name', 'name' => 'maritalStatus.name', 'title' => 'marital status', 'searchable' => true],
            ['data' => 'age.name', 'name' => 'age.name', 'title' => 'Age', 'searchable' => true],
            ['data' => 'refugee_state.name', 'name' => 'refugeeState.name', 'title' => 'Refuge', 'searchable' => true],
            ['data' => 'working_state.name', 'name' => 'workingState.name', 'title' => 'Working State', 'searchable' => true],
            ['data' => 'sectors', 'name' => 'sectors.name', 'title' => 'Sectors', 'searchable' => true],
            ['data' => 'areas', 'name' => 'areas.name', 'title' => 'Areas', 'searchable' => true],
            ['data' => 'disability.name', 'name' => 'disability.name', 'title' => 'Disability', 'searchable' => true],
            ['data' => 'academic_level.name', 'name' => 'academicLevel.name', 'title' => 'Academic Level', 'searchable' => true],
            ['data' => 'contactable', 'name' => 'contactable', 'title' => 'Contactable', 'searchable' => true],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At', 'searchable' => false],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated At', 'searchable' => false],
        ];
    }

    /**
     * Build excel file and prepare for export.
     *
     * @return \Maatwebsite\Excel\Writers\LaravelExcelWriter
     */
    protected function buildExcelFile()
    {
        /** @var \Maatwebsite\Excel\Excel $excel */
        $excel = app('excel');

        return $excel->create($this->filename(), function (LaravelExcelWriter $excel) {
            $excel->sheet('exported-data', function (LaravelExcelWorksheet $sheet) {
                $sheet->fromArray($this->getDataForExport());
            });
        });
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'citizensdatatables_' . time();
    }
}
