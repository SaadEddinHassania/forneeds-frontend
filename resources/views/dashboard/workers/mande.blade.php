@extends('dashboard.layout.dashboard')

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
                    <a href="Database_SocialWorkers.html">Social Workers</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Open Organizations</span>

                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Monitoring And Evaluation
            <small>Organizations With Open Projects</small>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">


                <div id="MainMenu">
                    <div class="list-group panel">
                        <a href="#organization_a" class="list-group-item list-group-item-success" data-toggle="collapse"
                           data-parent="#MainMenu"><i class="fa fa-circle " aria-hidden="true"></i> &nbsp; Organization
                            A</a>
                        <div class="collapse in" id="organization_a">
                            <a href="#project_a" class="list-group-item" data-toggle="collapse"
                               data-parent="#project_a"><i class="fa fa-angle-right" aria-hidden="true"></i> &nbsp;Project
                                A </a>
                            <div class="collapse list-group-submenu" id="project_a">
                                <a class="list-group-item" data-parent="#project_a" data-toggle="modal" href="#basic">Survay
                                    a</a>
                                <a class="list-group-item" data-parent="#project_a" data-toggle="modal" href="#basic">Survay
                                    b</a>

                                <a class="list-group-item" data-parent="#project_a" data-toggle="modal" href="#basic">Survay
                                    c</a>
                            </div>
                            <a href="#project_b" class="list-group-item" data-toggle="collapse"
                               data-parent="#project_b"><i class="fa fa-angle-right" aria-hidden="true"></i> &nbsp;Project
                                B</a>
                            <div class="collapse list-group-submenu" id="project_b">
                                <a class="list-group-item" data-parent="#project_b" data-toggle="modal" href="#basic">Survay
                                    a</a>
                                <a class="list-group-item" data-parent="#project_b" data-toggle="modal" href="#basic">Survay
                                    b</a>
                                <a class="list-group-item" data-parent="#project_b" data-toggle="modal" href="#basic">Survay
                                    c</a>
                            </div>
                            <a href="#project_c" class="list-group-item" data-toggle="collapse"
                               data-parent="#project_c"><i class="fa fa-angle-right" aria-hidden="true"></i> &nbsp;Project
                                C</a>
                            <div class="collapse list-group-submenu" id="project_c">
                                <a class="list-group-item" data-parent="#project_c" data-toggle="modal" href="#basic">Survay
                                    a</a>
                                <a class="list-group-item" data-parent="#project_c" data-toggle="modal" href="#basic">Survay
                                    b</a>
                                <a class="list-group-item" data-parent="#project_c" data-toggle="modal" href="#basic">Survay
                                    c</a>
                            </div>
                        </div>

                        <a href="#organization_b" class="list-group-item list-group-item-success" data-toggle="collapse"
                           data-parent="#MainMenu"><i class="fa fa-circle" aria-hidden="true"></i>&nbsp; Organization B</a>
                        <div class="collapse" id="organization_b">
                            <a href="#project_a_b" class="list-group-item" data-toggle="collapse"
                               data-parent="#project_a_b"><i class="fa fa-angle-right" aria-hidden="true"></i> &nbsp;Project
                                A </a>
                            <div class="collapse list-group-submenu" id="project_a_b">
                                <a class="list-group-item" data-parent="#project_a_b" data-toggle="modal" href="#basic">Survay
                                    a</a>
                                <a class="list-group-item" data-parent="#project_a_b" data-toggle="modal" href="#basic">Survay
                                    b</a>

                                <a class="list-group-item" data-parent="#project_a_b" data-toggle="modal" href="#basic">Survay
                                    c</a>
                            </div>
                            <a href="#project_b_b" class="list-group-item" data-toggle="collapse"
                               data-parent="#project_b_b"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;Project
                                B</a>
                            <div class="collapse list-group-submenu" id="project_b_b">
                                <a class="list-group-item" data-parent="#project_b_b" data-toggle="modal" href="#basic">Survay
                                    a</a>
                                <a class="list-group-item" data-parent="#project_b_b" data-toggle="modal" href="#basic">Survay
                                    b</a>
                                <a class="list-group-item" data-parent="#project_b_b" data-toggle="modal" href="#basic">Survay
                                    c</a>
                            </div>
                            <a href="#project_c_b" class="list-group-item" data-toggle="collapse"
                               data-parent="#project_c_b"><i class="fa fa-angle-right" aria-hidden="true"></i> &nbsp;Project
                                C</a>
                            <div class="collapse list-group-submenu" id="project_c_b">
                                <a class="list-group-item" data-parent="#project_c_b" data-toggle="modal" href="#basic">Survay
                                    a</a>
                                <a class="list-group-item" data-parent="#project_c_b" data-toggle="modal" href="#basic">Survay
                                    b</a>
                                <a class="list-group-item" data-parent="#project_c_b" data-toggle="modal" href="#basic">Survay
                                    c</a>
                            </div>
                        </div>


                    </div>
                </div>


            </div>
        </div>


        <div class="clearfix"></div>

        <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title"><i class="fa fa-info-circle" aria-hidden="true"></i> Survay A - Project
                            A </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1" style="line-height:72px;">
                                <i><b> Survay # 1 : </b></i> Survay Name
                            </div>
                            <div class="col-md-6">
                                <i><b> Progress of Survay: </b></i> &nbsp;
                                <span class="easy-pie-chart">
															<div class="number transactions" data-percent="55"
                                                                 style="display:inline-block">
																<span>+55</span>% </div>
												    </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn blue" href="{{route('Dashboard.work.survey')}}">Social Workers By Name</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


    </div>
    <!-- END CONTENT BODY -->
@stop