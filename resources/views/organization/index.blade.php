@extends('organization.layout.profile')

@section('content')
    <!-- BEGIN PAGE HEADER-->

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">

            <li>
                <span>Dashboard</span>
            </li>
        </ul>

    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Dashboard
        <small>dashboard & statistics</small>
    </h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <!-- BEGIN DASHBOARD STATS 1-->

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$ben_count}}">0</span>
                    </div>
                    <div class="desc"> Beneficiaries</div>
                </div>
                <a class="more" href="javascript:;"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
            <div class="dashboard-stat red">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$org_count}}">0</span></div>
                    <div class="desc"> Organization</div>
                </div>
                <a class="more" href="javascript:;"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
            <div class="dashboard-stat green">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$active_projects}}">0</span>
                    </div>
                    <div class="desc"> Active Projects</div>
                </div>
                <a class="more" href="javascript:;"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple">
                <div class="visual">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$survey_count}}"></span></div>
                    <div class="desc">Surveys</div>
                </div>
                <a class="more" href="javascript:;"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$workers_count}}"></span></div>
                    <div class="desc">Social Workers</div>
                </div>
                <a class="more" href="javascript:;"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-cursor font-dark hide"></i>
                        <span class="caption-subject font-dark bold uppercase">Sectors</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="easy-pie-chart">
                                <div class="number transactions" data-percent="55">
                                    <span>+55</span>%
                                    <canvas height="75" width="75"></canvas>
                                </div>
                                <a class="title" href="javascript:;"> Transactions
                                    <i class="icon-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="margin-bottom-10 visible-sm"></div>
                        <div class="col-md-2">
                            <div class="easy-pie-chart">
                                <div class="number visits" data-percent="85">
                                    <span>+85</span>%
                                    <canvas height="75" width="75"></canvas>
                                </div>
                                <a class="title" href="javascript:;"> New Visits
                                    <i class="icon-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="margin-bottom-10 visible-sm"></div>
                        <div class="col-md-2">
                            <div class="easy-pie-chart">
                                <div class="number bounce" data-percent="46">
                                    <span>-46</span>%
                                    <canvas height="75" width="75"></canvas>
                                </div>
                                <a class="title" href="javascript:;"> Bounce
                                    <i class="icon-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="easy-pie-chart">
                                <div class="number transactions" data-percent="55">
                                    <span>+55</span>%
                                    <canvas height="75" width="75"></canvas>
                                </div>
                                <a class="title" href="javascript:;"> Transactions
                                    <i class="icon-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="margin-bottom-10 visible-sm"></div>
                        <div class="col-md-2">
                            <div class="easy-pie-chart">
                                <div class="number visits" data-percent="85">
                                    <span>+85</span>%
                                    <canvas height="75" width="75"></canvas>
                                </div>
                                <a class="title" href="javascript:;"> New Visits
                                    <i class="icon-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="margin-bottom-10 visible-sm"></div>
                        <div class="col-md-2">
                            <div class="easy-pie-chart">
                                <div class="number bounce" data-percent="46">
                                    <span>-46</span>%
                                    <canvas height="75" width="75"></canvas>
                                </div>
                                <a class="title" href="javascript:;"> Bounce
                                    <i class="icon-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>


@stop