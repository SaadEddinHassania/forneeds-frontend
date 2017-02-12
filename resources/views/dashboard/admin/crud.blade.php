@extends('dashboard.layout.dashboard')

@section('content')

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Accounts</span>
                </li>
            </ul>

            <div class="page-toolbar">
                <div class="pull-right">
                    <a href="{{route('Dashboard.admin.crud.create')}}" class="btn blue"><i class="fa fa-plus" aria-hidden="true"></i> Add New Account</a>
                </div>
            </div>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Accounts
            <small>Manage</small>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th> # </th>
                        <th> Table heading </th>
                        <th> Table heading </th>
                        <th> Table heading </th>
                        <th> Table heading </th>
                        <th> Table heading </th>
                        <th>  </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> 1 </td>
                        <td> Table cell </td>
                        <td> Table cell </td>
                        <td> Table cell </td>
                        <td> Table cell </td>
                        <td> Table cell </td>
                        <td> <a href="{{route('Dashboard.admin.crud.edit')}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="{{route('Dashboard.admin.crud.delete')}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td> 2 </td>
                        <td> Table cell </td>
                        <td> Table cell </td>
                        <td> Table cell </td>
                        <td> Table cell </td>
                        <td> Table cell </td>
                        <td> <a href="{{route('Dashboard.admin.crud.edit')}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="{{route('Dashboard.admin.crud.delete')}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </td>
                    </tr>
                    <tr>
                        <td> 3 </td>
                        <td> Table cell </td>
                        <td> Table cell </td>
                        <td> Table cell </td>
                        <td> Table cell </td>
                        <td> Table cell </td>
                        <td> <a href="{{route('Dashboard.admin.crud.edit')}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="{{route('Dashboard.admin.crud.delete')}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="clearfix"></div>


    </div>
@stop