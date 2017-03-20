<?php

namespace App\DataTables;

use App\Models\Users\SocialWorker;
use App\User;
use Yajra\Datatables\Services\DataTable;

class SocialWorkerDatatablePending extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function with($key, $val)
    {
        $this->$key = $val;
        return $this;
    }
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->editColumn('is_accepted', function ($worker) {
                return $worker->is_accepted ? 'true' : '-';
            })
            ->editColumn('cv', function ($worker) {

                $route = route('files', str_replace('public/cvs/', '', $worker->cv));
                return "<a href='{$route}' class='btn'><i class='glyphicon glyphicon-download-alt'></i></a>";
            })
            ->addColumn('action', function ($row) {
                $modelRoute = str_replace('\\', '-', SocialWorker::class);
                $id = $row->id;

                $project_id = $this->project_id;
                return view('dashboard.organizations.forms.accept-org', compact('modelRoute', 'id', 'project_id'));
            })->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = SocialWorker::with(array('user', 'age', 'area', 'gender'))->selectRaw('distinct social_workers.*');
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
    protected function getColumns()
    {
        return [
            [
                'name' => '', 'title' => '', 'data' => null, 'searchable' => false, 'orderable' => false, 'sorting' => 'false', 'width' => '20px', 'className' => 'details-control handCursor', "defaultContent" => '+'],

            ['title' => 'Name', 'name' => 'user.name', 'data' => 'user.name', 'searchable' => true],
            ['data' => 'area.name', 'name' => 'area.name', 'title' => 'Area', 'searchable' => true],
            ['data' => 'age.name', 'name' => 'age.name', 'title' => 'Age', 'searchable' => true],
            ['data' => 'gender.name', 'name' => 'gender.name', 'title' => 'Gender', 'searchable' => true],
            ['title' => 'Address', 'name' => 'address', 'data' => 'address', 'searchable' => true],
            ['title' => 'Mobile',
                'name' => 'mobile',
                'data' => 'mobile', 'searchable' => true],
            ['title' => 'Telephone',
                'name' => 'telephone',
                'data' => 'telephone', 'searchable' => true],
            ['title' => 'CV',
                'name' => 'cv',
                'data' => 'cv', 'searchable' => true],
            ['title' => 'Accepted',
                'name' => 'is_accepted',
                'data' => 'is_accepted', 'searchable' => true],

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
        return 'socialworkerdatatables_' . time();
    }
}
