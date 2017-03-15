<?php

namespace App\DataTables;

use App\Models\Users\SocialWorker;
use App\User;
use Yajra\Datatables\Services\DataTable;

class SurveysWorkersDatatable extends DataTable
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
                $modelRoute = "Dashboard.work";
                $id = $row->id;
                return view('dashboard.workers.actions', compact('modelRoute', 'id'));
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
        $request = $this->request();
        $query = SocialWorker::with(array('user','surveys'))->selectRaw('distinct social_workers.*');


        if ($request->has('survey_id')) {
            $query->whereHas('surveys', function ($s) use ($request) {
                if ($request->has('survey_id') && $survey = $request->input('survey_id')) {
                    $s->where('social_worker_survey.survey_id', $survey);
                }
            });
        }
        $query->where('is_accepted', true);


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
            ->parameters([
                'dom' => 'Btp',
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
    protected function getColumns()
    {
        return [
            ['title' => 'Name', 'name' => 'user.name', 'data' => 'user.name', 'searchable' => true],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'surveysworkersdatatables_' . time();
    }
}
