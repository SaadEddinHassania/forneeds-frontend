@extends('layouts.metronic.app')

@push('styles')
<link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/user-card.css" rel="stylesheet" type="text/css"/>
<link href="../assets/to-do.css" rel="stylesheet" type="text/css"/>
<style>
    .no-border {
        border: 0;
        box-shadow: none; /* You may want to include this as bootstrap applies these styles too */
    }

     input.transparent-input{
         background-color:rgba(0,0,0,0) !important;
         border:none !important;
     }
</style>
@endpush
@section('content')

    {{--<div class="page-content-wrapper">--}}
    <!-- BEGIN CONTENT BODY -->
    {{--<div class="page-content">--}}
    <!-- BEGIN PAGE HEADER-->

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>User</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right">
                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown">
                    Actions
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">
                            <i class="icon-bell"></i> Action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-shield"></i> Another action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-user"></i> Something else here</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <i class="icon-bag"></i> Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> User Profile
        <small></small>
    </h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="{{url('/profile_image')}}" class="img-responsive" alt=""></div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> {{$user->name}} </div>
                        <div class="profile-usertitle-job"> Service Provider</div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                        <button type="button" class="btn btn-circle red btn-sm">Message</button>
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="{!! Request::is('profile*') ? 'active' : '' !!}">
                                <a href="{!! url('/profile') !!}">
                                    <i class="icon-home"></i> Profile </a>
                            </li>
                            <li class="{!! Request::is('settings*') ? 'active' : '' !!}">
                                <a href="{!! url('/settings') !!}">
                                    <i class="icon-settings"></i> Account Settings </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
                <!-- PORTLET MAIN -->
                <div class="portlet light ">
                    <!-- STAT -->
                    <div class="row list-separated profile-stat">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 37</div>
                            <div class="uppercase profile-stat-text"> Projects</div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 51</div>
                            <div class="uppercase profile-stat-text"> Tasks</div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 61</div>
                            <div class="uppercase profile-stat-text"> Uploads</div>
                        </div>
                    </div>
                    <!-- END STAT -->
                    <div>
                        <h4 class="profile-desc-title">About Marcus Doe</h4>
                        <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <a href="http://www.keenthemes.com">www.keenthemes.com</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-twitter"></i>
                            <a href="http://www.twitter.com/keenthemes/">@keenthemes</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-facebook"></i>
                            <a href="http://www.facebook.com/keenthemes/">keenthemes</a>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-8">
                        <!-- BEGIN PORTLET -->
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption caption-md">
                                    <i class="icon-bar-chart theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">New Survey</span>
                                    <span class="caption-helper hide">weekly stats...</span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                                            <input type="radio" name="options" class="toggle" id="option1">Today</label>
                                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                            <input type="radio" name="options" class="toggle" id="option2">Week</label>
                                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                            <input type="radio" name="options" class="toggle" id="option2">Month</label>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                @include("surveys.complete",['projects'=>$projects,'sp'=>$sp])
                            </div>
                        </div>
                        <!-- END PORTLET -->
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <!-- BEGIN PORTLET -->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <i class="icon-bar-chart theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">New Project</span>
                                        <span class="caption-helper hide">weekly stats...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle"
                                                       id="option1">Today</label>
                                            <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle"
                                                       id="option2">Week</label>
                                            <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle"
                                                       id="option2">Month</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    @include("projects.add")
                                </div>
                            </div>
                            <!-- END PORTLET -->
                        </div>


                    </div>
                    <section class="task-panel portlet light tasks-widget">
                        <div class=" portlet-heading">
                            <div class="pull-left"><h5><i class="fa fa-tasks"></i> Surveys - <span
                                            class="badge bg-info">8</span></h5>

                            </div>
                            <a class="btn btn-success btn-sm pull-right" href="todo_list.html#">Add New Survey</a>
                            <br>
                        </div>
                        <div class="portlet-body">
                            <div class="task-content">

                                <ul class="task-list col-md-12">
                                    <li>
                                        <div class="row">
                                            <a class=" btn-block  btn-xs " style="color:#797979;" data-toggle="collapse"
                                               href="#collapse1">
                                                <div class="task-title text-left">
                                                    <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                                    <span class="badge bg-theme">Done</span>
                                                    <span class="caret pull-right"></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="row">
                                            <div id="collapse1" class="task-content row panel-collapse collapse">
                                                <div class="panel  ">
                                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur
                                                        adipisicing elit,
                                                        sed do eiusmod tempor incididunt ut labore et dolore magna
                                                        aliqua. Ut enim ad
                                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                        aliquip ex ea
                                                        commodo consequat.
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="dashboard-stat2 ">
                                                                <div class="display">
                                                                    <div class="number">
                                                                        <h3 class="font-green-sharp">
                                                                            <span data-counter="counterup"
                                                                                  data-value="7800">7800</span>
                                                                            <small class="font-green-sharp">$</small>
                                                                        </h3>
                                                                        <small>TOTAL PROFIT</small>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <i class="icon-pie-chart"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="progress-info">
                                                                    <div class="progress">
                                            <span style="width: 76%;"
                                                  class="progress-bar progress-bar-success green-sharp">
                                                <span class="sr-only">76% progress</span>
                                            </span>
                                                                    </div>
                                                                    <div class="status">
                                                                        <div class="status-title"> progress</div>
                                                                        <div class="status-number"> 76%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="dashboard-stat2 ">
                                                                <div class="display">
                                                                    <div class="number">
                                                                        <h3 class="font-purple-soft">
                                                                            <span data-counter="counterup"
                                                                                  data-value="276">276</span>
                                                                        </h3>
                                                                        <small>NEW USERS</small>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <i class="icon-user"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="progress-info">
                                                                    <div class="progress">
                                            <span style="width: 57%;"
                                                  class="progress-bar progress-bar-success purple-soft">
                                                <span class="sr-only">56% change</span>
                                            </span>
                                                                    </div>
                                                                    <div class="status">
                                                                        <div class="status-title"> change</div>
                                                                        <div class="status-number"> 57%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="dashboard-stat2 ">
                                                                <div class="display">
                                                                    <div class="number">
                                                                        <h3 class="font-red-haze">
                                                                            <span data-counter="counterup"
                                                                                  data-value="1349">1349</span>
                                                                        </h3>
                                                                        <small>NEW FEEDBACKS</small>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <i class="icon-like"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="progress-info">
                                                                    <div class="progress">
                                            <span style="width: 85%;"
                                                  class="progress-bar progress-bar-success red-haze">
                                                <span class="sr-only">85% change</span>
                                            </span>
                                                                    </div>
                                                                    <div class="status">
                                                                        <div class="status-title"> change</div>
                                                                        <div class="status-number"> 85%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12  mb">
                                                        <div class="panel-group accordion scrollable" id="accordion2">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h4 class="panel-title">
                                                                        <a class="accordion-toggle collapsed"
                                                                           data-toggle="collapse"
                                                                           data-parent="#accordion2"
                                                                           href="#collapse_2_1" aria-expanded="false">
                                                                            <input type="text" class="transparent-input" readonly name="answer" value="question">
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div id="collapse_2_1" class="panel-collapse collapse"
                                                                     aria-expanded="false" style="height: 0px;">
                                                                    <div class="panel-body">
                                                                        <div class="col-md-4">
                                                                            <div class="dashboard-stat2 ">
                                                                                <div class="display">
                                                                                    <div class="number">
                                                                                        <input type="text" class="no-border" readonly name="answer" value="TOTAL PROFIT">
                                                                                    </div>
                                                                                    <div class="icon">
                                                                                        <i class="icon-pie-chart"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="progress-info">
                                                                                    <div class="progress">
                                            <span style="width: 76%;"
                                                  class="progress-bar progress-bar-success green-sharp">
                                                <span class="sr-only">76% progress</span>
                                            </span>
                                                                                    </div>
                                                                                    <div class="status">
                                                                                        <div class="status-title">
                                                                                            progress
                                                                                        </div>
                                                                                        <div class="status-number">
                                                                                            76%
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
                                            </div>
                                        </div>

                                    </li>

                                </ul>
                            </div>

                            <div style="padding:5px;" class="row  col-sm-offset add-task-row">
                                <a class="btn btn-block btn-success btn-sm pull-left" href="todo_list.html#">Add New
                                    Tasks</a>
                                <a class="btn btn-block btn-default btn-sm pull-right" href="todo_list.html#">See All
                                    Tasks</a>
                            </div>
                        </div>
                    </section>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PORTLET -->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <i class="icon-bar-chart theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">Your Activity</span>
                                        <span class="caption-helper hide">weekly stats...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle"
                                                       id="option1">Today</label>
                                            <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle"
                                                       id="option2">Week</label>
                                            <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle"
                                                       id="option2">Month</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row number-stats margin-bottom-30">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="stat-left">
                                                <div class="stat-chart">
                                                    <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                                    <div id="sparkline_bar"></div>
                                                </div>
                                                <div class="stat-number">
                                                    <div class="title"> Total</div>
                                                    <div class="number"> 2460</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="stat-right">
                                                <div class="stat-chart">
                                                    <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                                    <div id="sparkline_bar2"></div>
                                                </div>
                                                <div class="stat-number">
                                                    <div class="title"> New</div>
                                                    <div class="number"> 719</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-scrollable table-scrollable-borderless">
                                        <table class="table table-hover table-light">
                                            <thead>
                                            <tr class="uppercase">
                                                <th colspan="2"> MEMBER</th>
                                                <th> Earnings</th>
                                                <th> CASES</th>
                                                <th> CLOSED</th>
                                                <th> RATE</th>
                                            </tr>
                                            </thead>
                                            <tr>
                                                <td class="fit">
                                                    <img class="user-pic" src="../assets/pages/media/users/avatar4.jpg">
                                                </td>
                                                <td>
                                                    <a href="javascript:;" class="primary-link">Brain</a>
                                                </td>
                                                <td> $345</td>
                                                <td> 45</td>
                                                <td> 124</td>
                                                <td>
                                                    <span class="bold theme-font">80%</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fit">
                                                    <img class="user-pic" src="../assets/pages/media/users/avatar5.jpg">
                                                </td>
                                                <td>
                                                    <a href="javascript:;" class="primary-link">Nick</a>
                                                </td>
                                                <td> $560</td>
                                                <td> 12</td>
                                                <td> 24</td>
                                                <td>
                                                    <span class="bold theme-font">67%</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fit">
                                                    <img class="user-pic" src="../assets/pages/media/users/avatar6.jpg">
                                                </td>
                                                <td>
                                                    <a href="javascript:;" class="primary-link">Tim</a>
                                                </td>
                                                <td> $1,345</td>
                                                <td> 450</td>
                                                <td> 46</td>
                                                <td>
                                                    <span class="bold theme-font">98%</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fit">
                                                    <img class="user-pic" src="../assets/pages/media/users/avatar7.jpg">
                                                </td>
                                                <td>
                                                    <a href="javascript:;" class="primary-link">Tom</a>
                                                </td>
                                                <td> $645</td>
                                                <td> 50</td>
                                                <td> 89</td>
                                                <td>
                                                    <span class="bold theme-font">58%</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- END PORTLET -->
                        </div>

                    </div>


                </div>
                <!-- END PROFILE CONTENT -->
            </div>
        </div>
    {{--</div>--}}
    <!-- END CONTENT BODY -->
        {{--</div>--}}

        @endsection
        @push('styles')
        <link href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet"
              type="text/css"/>
        @endpush

        @push('scripts')
        <script src="js/jquery.form.js"></script>
        <script src="/assets/survey_widget.js" type="text/javascript"></script>
        <script src="/assets/project_widget.js" type="text/javascript"></script>
        <script src="/assets/pages/scripts/form-wizard.min.js"></script>
        <script src="/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/jquery-validation/js/jquery.validate.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/jquery-validation/js/additional-methods.min.js"
                type="text/javascript"></script>
        <script src="/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"
                type="text/javascript"></script>


        <script src="/assets/pages/scripts/components-date-time-pickers.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js"
                type="text/javascript"></script>
        @endpush

        @push('scripts')

        <script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
                type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>


        <script src="../assets/pages/scripts/profile.min.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/timeline.min.js" type="text/javascript"></script>
    @endpush