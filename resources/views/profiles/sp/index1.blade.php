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

    input.transparent-input {
        background-color: rgba(0, 0, 0, 0) !important;
        border: none !important;
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
                <a href="{{url('/')}}">Home</a>
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
                        <a href="{{url('logout')}}">
                            <i class="icon-bell"></i> logout</a>
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
                            <a class="btn btn-success btn-sm pull-right" href="{{url('\test')}}">download pdf</a>
                            <br>
                        </div>
                        <div class="portlet-body">
                            <div class="task-content">

                                <ul class="task-list col-md-12">
                                    @foreach($surveys as $survey)
                                        <li>
                                            <div class="row col-lg-12">
                                                <a class=" btn-block   "
                                                   data-toggle="collapse"
                                                   href="#collapse{{$survey->id}}">
                                                    <div class="task-title text-left">
                                                        <span class="task-title-sp">{{$survey->subject}}</span>
                                                        <span class="caret pull-right"></span>
                                                        <span class="badge  bg-theme text-center badge-primary">pending</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="row">
                                                <div id="collapse{{$survey->id}}"
                                                     class="task-content row panel-collapse collapse">
                                                    <div class="panel  ">
                                                        <div class="panel-body">
                                                            <p class="well col-lg-12">{{$survey->description}}</p>
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
                                                                                <small class="font-green-sharp">$
                                                                                </small>
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

                                                            <div class="panel-group accordion scrollable"
                                                                 id="accordion2">
                                                                @foreach($survey->questions as $question)
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a class="accordion-toggle collapsed"
                                                                                   data-toggle="collapse"
                                                                                   data-parent="#accordion2"
                                                                                   href="#collapse_{{$survey->id}}{{$survey->id}}_{{$question->id}}"
                                                                                   aria-expanded="false">
                                                                                    <input type="text"
                                                                                           class="transparent-input"
                                                                                           readonly name="body"
                                                                                           value="{{$question->body}} ?">
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapse_{{$survey->id}}{{$survey->id}}_{{$question->id}}"
                                                                             class="panel-collapse collapse"
                                                                             aria-expanded="false" style="height: 0px;">
                                                                            <div class="panel-body">
                                                                                @foreach($question->answers as $answer)
                                                                                    <div class="col-md-4">
                                                                                        <div class="dashboard-stat2 ">
                                                                                            <div class="display">
                                                                                                <div class="number">
                                                                                                    <input type="text"
                                                                                                           class="no-border"
                                                                                                           readonly
                                                                                                           name="answer"
                                                                                                           value="{{$answer->answer}}">
                                                                                                </div>
                                                                                                <div class="icon">
                                                                                                    <i class="icon-pie-chart"></i>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="progress-info">
                                                                                                <div class="progress">
                                                                                                <span style="width: 76%;"
                                                                                                      class="progress-bar progress-bar-success green-sharp">
                                                                                                    <span class="sr-only">76% pick rate</span>
                                                                                                </span>
                                                                                                </div>
                                                                                                <div class="status">
                                                                                                    <div class="status-title">
                                                                                                        Pick Rate
                                                                                                    </div>
                                                                                                    <div class="status-number">
                                                                                                        76%
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                @endforeach

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    @endforeach
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