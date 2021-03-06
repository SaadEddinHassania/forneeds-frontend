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
                    <a href="Database_SocialWorkers.html">Social Workers</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="Monitor_evaluate.html">Monitoring and Evaluation</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Progress For Social Workers</span>

                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Monitoring and Evaluation
            <small>Social Workers By Name</small>
        </h3>
        <div class="clearfix"></div>

        @include('flash::message')
        <div class="clearfix"></div>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-red bold uppercase"><i class="fa fa-info-circle"
                                                                                     aria-hidden="true"></i> Details</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-group">
                            <i>Organization : </i>
                            <span> {{$sp->name}} </span>
                        </div>
                        <div class="form-group">
                            <i>Project : </i>
                            <span> {{$project->name}} </span>
                        </div>
                        <div class="form-group">
                            <i>Survay : </i>
                            <span> {{$survey->subject}} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portlet light borderless">

            <div class="clearfix"></div>
            <div class="box box-primary">
                <div class="box-body">
                    {!! $dataTable->table(['width' => '100%','class'=>'table-striped'],true) !!}
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
{!! $dataTable->scripts() !!}
<script>
    function mix(source, target) {
        $(source).each(function (i, v) {
            console.log(i, v);
            target[v['name']] = v['value'];
        })

    }

    $('#dataTableBuilder')
        .on('preXhr.dt', function (e, settings, data) {
            mix({name: "survey_id", value: {{$survey->id}} }, data);
        })
        .dataTable({
            ajax: "data.json"
        });

    $(function () {
        window.LaravelDataTables.dataTableBuilder.draw();
    });
</script>
@endpush
