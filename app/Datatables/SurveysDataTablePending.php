<?php

namespace App\DataTables;

use App\Models\Survey;
use App\User;
use Yajra\Datatables\Services\DataTable;

class SurveysDataTablePending extends DataTable
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
            ->addColumn('action', function ($row) {
                $modelRoute = str_replace('\\', '-', Survey::class);
                $id = $row->id;
                return view('dashboard.organizations.forms.accept-org', compact('modelRoute', 'id'));
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
        $query = Survey::query();
        $query->where('is_accepted', false);

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
            ->ajax('')
            ->addAction(['width' => '80px'])
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'subject', 'name' => 'subject', 'title' => 'Subject', 'searchable' => true],
            ['data' => 'description', 'name' => 'description', 'title' => 'description', 'searchable' => true]

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'surveysdatatablependings_' . time();
    }
}
