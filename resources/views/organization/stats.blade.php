@extends('organization.layout.profile')

@section('content')
    <!-- BEGIN PAGE HEADER-->

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="providers_index.html">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>

            <li>
                <span>Statistics</span>
            </li>

        </ul>

        <div class="page-toolbar">
            <div class="pull-right">
                <a href="generate_report.html" class="btn red"><i class="fa fa-file-image-o" aria-hidden="true"></i> Generate Report</a>
                <a href="#" class="btn blue"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
            </div>
        </div>


    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Statistics
        <small>Survays</small>
    </h3>

    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-info-circle font-red" aria-hidden="true"></i>
                        <span class="caption-subject font-red sbold uppercase">Choose Survay</span>
                    </div>
                    <div class="pull-right">
                        <a class="btn red" data-toggle="modal" href="#basic"><i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;Statistics For Two Question</a>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Project </label>
                                <select class="form-control">
                                    <option>Select One</option>
                                    <option>Project A</option>
                                    <option>Project B</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Survay </label>
                                <select class="form-control">
                                    <option>Select One</option>
                                    <option>Survay A</option>
                                    <option>Survay B</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="">
                        <div class="pull-left"><h4 class="font-red sbold uppercase"><i class="fa fa-list" aria-hidden="true"></i> Survay Questions list</h4></div>

                    </div>

                </div>
                <div class="portlet-body">
                    <div id="MainMenu">
                        <div class="scroller" style="height: 312px;" data-always-visible="1" data-rail-visible1="1">
                            <div class="list-group panel">
                                <a href="javascript:;" style="background-color:#DFDFDF" href="#question_a" class="list-group-item" ><i class="fa fa-minus" aria-hidden="true"></i> &nbsp; Question

                                </a>
                                <div class="" id="question_a">
                                    <div class="list-group-item" data-toggle="" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ol>
                                                    <li>Answer</li>
                                                    <li>Answer</li>
                                                    <li>Answer</li>
                                                    <li>Answer</li>
                                                </ol>

                                            </div>
                                            <div class="col-md-6">
                                                <div  class="chart draw_question_a" style="height:230px;"> </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <a  href="javascript:;" style="background-color:#DFDFDF" href="#question_b" class="list-group-item"><i class="fa fa-minus" aria-hidden="true"></i>&nbsp; Question B</a>
                                <div class="" id="question_b">
                                    <div class="list-group-item" data-toggle="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ol>
                                                    <li>Answer</li>
                                                    <li>Answer</li>
                                                    <li>Answer</li>
                                                    <li>Answer</li>
                                                </ol>

                                            </div>
                                            <div class="col-md-6">
                                                <div  class="chart draw_question_b" style="height:230px;"> </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="clearfix"></div>



@stop
