@extends('dashboard.layout.dashboard')
@push('page_style_plugins')
<link rel="stylesheet" href="{{asset('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}">


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css">
<style>
    #dataTableBuilder_filter {
        display: inline-block;
        float: right;
    }

    #dataTableBuilder_length {
        display: inline-block;
        line-height: 1.42857;
    }
    .dt-buttons{
        right: 1%;
        position: absolute !important;
        top: 1%;
    }
</style>

@endpush
@section('content')
    <!-- BEGIN CONTENT BODY -->
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
                    <a href="Providers-Database.html">Service Providers</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Organizations</span>

                </li>
            </ul>

            <div class="page-toolbar">
                <div class="pull-right">
                    <a href="{{route('Dashboard.org.payment')}}" class="btn blue"><i class="fa fa-hand-o-up" aria-hidden="true"></i>
                        Request for payment</a>
                </div>
            </div>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <div class="clearfix"></div>

        @include('flash::message')
        <div class="clearfix"></div>
        <h3 class="page-title"> Service Providers
            <small>Organizations</small>
        </h3>
        <!-- END PAGE TITLE-->
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1_1" data-toggle="tab"> New Organizations </a>
                    </li>
                    <li>
                        <a href="#tab_1_2" data-toggle="tab"> New Projects </a>
                    </li>
                    <li>
                        <a href="#tab_1_3" data-toggle="tab"> New Survays </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tab_1_1">
                        {!! $dataTable->table(['width' => '100%','class'=>'table-striped']) !!}

                    </div>
                    <div class="tab-pane fade" id="tab_1_2">
                        <table class="table">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th> Table heading</th>
                                <th> Table heading</th>
                                <th> Table heading</th>
                                <th> Table heading</th>
                                <th> Table heading</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td> 1</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn blue btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-check" aria-hidden="true"></i> Accept</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-times" aria-hidden="true"></i> Reject</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> 2</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn blue btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-check" aria-hidden="true"></i> Accept</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-times" aria-hidden="true"></i> Reject</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> 3</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn blue btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-check" aria-hidden="true"></i> Accept</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-times" aria-hidden="true"></i> Reject</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="tab_1_3">
                        <table class="table">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th> Table heading</th>
                                <th> Table heading</th>
                                <th> Table heading</th>
                                <th> Table heading</th>
                                <th> Table heading</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td> 1</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn blue btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-check" aria-hidden="true"></i> Accept</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-times" aria-hidden="true"></i> Reject</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> 2</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn blue btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-check" aria-hidden="true"></i> Accept</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-times" aria-hidden="true"></i> Reject</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> 3</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td> Table cell</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn blue btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-check" aria-hidden="true"></i> Accept</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-times" aria-hidden="true"></i> Reject</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>


        <div class="clearfix"></div>


    </div>
    <!-- END CONTENT BODY -->
@stop
@push('page_script_plugins')

<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.6/handlebars.min.js"></script>
<script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>


<script src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/vendor/datatables/buttons.server-side.js')}}"></script>
<script src="{{asset('/assets/project_widget.js')}}"></script>
{!! $dataTable->scripts() !!}
@include('dashboard.organizations.crud_details')
<script>
    var template = Handlebars.compile($("#details-template").html());
    // Add event listener for opening and closing details
    $('#dataTableBuilder tbody').on('click', 'td.details-control', function () {
        var table = window.LaravelDataTables["dataTableBuilder"];
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child(template(row.data())).show();
            tr.addClass('shown');
        }
    });
   </script>
@endpush