@extends('endusers.layout.dashboard')

@section('menu')
    @include('endusers.citizens.menu')
@stop

@push('page_style_plugins')
@endpush
@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
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
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="1349">0</span>
                        </div>
                        <div class="desc"> Active ongoing project in area</div>
                    </div>
                    <a class="more" href="javascript:;"> View more
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="12">0</span></div>
                        <div class="desc"> Organization Working in area</div>
                    </div>
                    <a class="more" href="javascript:;"> View more
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="549">0</span>
                        </div>
                        <div class="desc"> Survays to fillfull</div>
                    </div>
                    <a class="more" href="javascript:;"> View more
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-6 col-xs-12 col-sm-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-dark hide"></i>
                            <span class="caption-subject font-red bold uppercase"><i class="fa fa-list"
                                                                                     aria-hidden="true"></i>&nbsp;List Of Survays</span>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th> Survay name</th>
                                <th> Start Time</th>
                                <th> End Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($surveys as $survey)
                                <tr>
                                    <td><a href="{{route('surveys',$survey->id)}}">{{$survey->subject}}</a></td>
                                    <td>{{$survey->starts_at->format('dd/yy/mm')}}</td>
                                    <td>{{$survey->expires_at->format('dd/yy/mm')}}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


            <div class="col-lg-6 col-xs-12 col-sm-12">
                <div class="portlet light tasks-widget bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-dark hide"></i>
                            <span class="caption-subject font-red bold uppercase"> <i class="fa fa-pie-chart"
                                                                                      aria-hidden="true"></i>&nbsp;About Sectors</span>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <div class="task-content">
                            <div class="scroller" style="height: 312px;" data-always-visible="1" data-rail-visible1="1">
                                <!-- START TASK LIST -->
                                <ul class="task-list">
                                    <li>

                                        <div class="task-title">
													    <span class="easy-pie-chart">
															<div class="number transactions" data-percent="55"
                                                                 style="display:inline-block">
																<span>+55</span>% </div>
														</span>
                                            <span class="task-title-sp"> brief description of organization </span>
                                        </div>

                                    </li>
                                    <li>

                                        <div class="task-title">
													    <span class="easy-pie-chart">
															<div class="number bounce" data-percent="15"
                                                                 style="display:inline-block">
																<span>+15</span>% </div>
														</span>
                                            <span class="task-title-sp"> brief description of organization </span>
                                        </div>

                                    </li>
                                    <li>

                                        <div class="task-title">
													    <span class="easy-pie-chart">
															<div class="number visits" data-percent="85"
                                                                 style="display:inline-block">
																<span>+85</span>% </div>
														</span>
                                            <span class="task-title-sp"> brief description of organization </span>
                                        </div>

                                    </li>

                                </ul>
                                <!-- END START TASK LIST -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-dark hide"></i>
                            <span class="caption-subject font-red bold uppercase"><i class="fa fa-map-marker"
                                                                                     aria-hidden="true"></i>&nbsp;Projects In Map</span>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <div id="gmap_marker" class="gmaps" style="height:450px"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
    <!-- END CONTENT BODY -->
@stop

@push('page_script_plugins')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
<script src="{{asset('/dashboard/assets/global/plugins/gmaps/gmaps.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/dashboard/assets/js/maps.js')}}" type="text/javascript"></script>

@endpush