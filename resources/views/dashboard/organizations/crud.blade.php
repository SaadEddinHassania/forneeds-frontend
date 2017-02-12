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
                    <a href="index.html">Dashborad</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Service Providers</span>
                </li>
            </ul>

            <div class="page-toolbar">
                <div class="pull-right">
                    <a href="{{route('Dashboard.org.crud.create')}}" class="btn blue"><i class="fa fa-plus"
                                                                                         aria-hidden="true"></i> Add New
                        Service Provider</a>
                </div>
            </div>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Service Providers
            <small>Database</small>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-red bold uppercase"><i class="fa fa-search"></i> Search Bar</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <form method="POST " id="search-form" class="form-horizontal">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Name</label>
                                        <div class="col-md-8">
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Sector</label>
                                        <div class="col-md-8">
                                            <select name="sector" class="form-control">
                                                <option value="" selected disabled>Sectors</option>

                                                @foreach($sectors as $id=>$name)
                                                    <option value="{{$id}}">{{$name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Area</label>
                                        <div class="col-md-8">
                                            <select name='area' class="form-control">
                                                <option value="" selected disabled>Areas</option>

                                                @foreach($areas as $id=>$name)
                                                    <option value="{{$id}}">{{$name}}</option>
                                                @endforeach
                                            </select></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Target</label>
                                        <div class="col-md-6">
                                            <select name='target' id='add_target_slct' class="form-control">
                                                <option value="" selected disabled>Targets</option>

                                            @foreach($targets as $id=>$name)
                                                    <option value="{{$id}}">{{$name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="col-lg-3 form-group">
                                                <a id="add_target_btn"
                                                   class=" btn-lg  glyphicon glyphicon-plus-sign"></a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">&nbsp&nbsp&nbsp&nbsp</label>

                                        <div id="targets_wrapper" class=" col-md-8 ">

                                            <div class="form-actions col-md-12   form-group">

                                            </div>
                                        </div>
                                        <div id="target_handler" style="display:none;">
                                            <div class="form-group col-md-11 deletable">

                                                {{ Form::select('target',array(),null,['class'=>'form-control col-md-7']) }}

                                            </div>
                                            <div class="col-md-2 del-btn">
                                                <div class="col-lg-3 form-group">
                                                    <a class=" btn-lg del_target_btn  glyphicon glyphicon-minus-sign"></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="margin-top-10">

                                <button type="submit" href="javascript:;" class="btn blue">Search <i
                                            class="fa blue fa-search"></i></button>

                                <input type="reset" class="btn blue" onclick="window.LaravelDataTables.dataTableBuilder.draw();">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        @include('flash::message')
        <div class="clearfix"></div>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row ">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-equalizer font-red-sunglo"></i>
                            <span class="caption-subject font-red-sunglo bold uppercase">ServiceProviders</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box box-primary">
                        <div class="box-body">
                            {!! $dataTable->table(['width' => '100%','class'=>'table-striped']) !!}
                        </div>
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
    function mix(source, target) {
        $(source).each(function (i, v) {
            console.log(i, v);
            target[v['name']] = v['value'];
        })

    }
    $('#dataTableBuilder')
        .on('preXhr.dt', function (e, settings, data) {
            console.log($('#search-form').serializeArray());
            mix($('#search-form').serializeArray(), data);
        })
        .dataTable({
            ajax: "data.json"
        });
    $('#search-form').on('submit', function (e) {

        window.LaravelDataTables.dataTableBuilder.draw();
        e.preventDefault();
    });
</script>
@endpush