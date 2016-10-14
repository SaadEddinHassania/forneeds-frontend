<?php

namespace App\DataTables;

use App\User;
use Form;
use Intervention\Image\Facades\Image;
use Yajra\Datatables\Services\DataTable;

class UserDataTable extends DataTable
{

//    public function __construct(Datatables $datatables, Factory $viewFactory)
//    {
//        parent::__construct($datatables, $viewFactory);
//    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', function ($row) {
                $model = "admin.users";
                $id = $row->id;
                return view('admin.layouts.datatables_actions', compact('model','id'));
            })
            ->editColumn('avatar', function ($row) {
                return '<img src="'.route('admin.users.image',['id'=>$row->id]).'"  width=70 alt=""></div>';
            })
//            ->editColumn('user_type', function ($row) {
//                if($row->isServiceProvider()){
//                    return 'Service Provider';
//                } else if($row->isCitizen()){
//                    return 'Citizen';
//                } else if($row->is_admin){
//                    return 'Admin';
//                }else {
//                    return 'Not completed';
//                }
//            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $users = User::query();
        return $this->applyScopes($users);
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
            'avatar' => ['name' => 'avatar', 'data' => 'avatar','searchable'=>false,'orderable'=>false,'width'=>'20px'],
            'name' => ['name' => 'name', 'data' => 'name'],
            'email' => ['name' => 'email', 'data' => 'email'],
            'user_type' =>['name' => 'user_type', 'data' => 'user_type','searchable'=>false,'orderable'=>false],
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
        return 'users';
    }
}
