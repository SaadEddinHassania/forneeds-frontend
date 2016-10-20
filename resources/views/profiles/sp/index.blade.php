@extends('layouts.profile')


@push('styles')
<link rel="stylesheet" href="css/bootstrap.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">


<link rel="stylesheet" href="css/citizen-style-default.css">
<link rel="stylesheet" href="css/citizen-style.css">
<link href="css/style-responsive.css" rel="stylesheet">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
<link rel="stylesheet" href="css/user-card.css">
<link rel="stylesheet" href="css/to-do.css">
<style>
    body {
        background: #f2f2f2 !important;
    }

    #fh5co-footer {
        position: relative;
        top: 7em;
    }

    .collapse {
        opacity: 0;
        transition: opacity 2s ease-in;

    }

    .in {
        opacity: 1;
        transition: opacity 2s ease-out;
    }
</style>
@endpush
@push('scripts')
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
<script>
    $('.container').on('click', ' div.task-content > ul  li > a', function (e) {
        e.stopPropagation();
        e.preventDefault();

        $v = $(this);
        console.log($v, $v.attr('href'));
        $($v.attr('href')).collapse('toggle');
    })
</script>
@endpush
@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-3 mb">
                <div id='card' class="text-center">
                    <div id="main">
                        <div id="img-wrapper">
                            <img src="https://secure.gravatar.com/avatar/729edf889ced7863dedba95452272bca?d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-140.png">
                        </div>
                        <h1>Hugo Giraudel</h1>

                        <div class="btn-group btn-group-sm btn-group-xs">
                            <a type="button" class="btn btn-default ">Settings</a>
                            <button type="button" class="btn btn-default  dropdown-toggle" data-toggle="dropdown">

                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu ">
                                <div class="btn btn-default btn-xs btn-block"><a href="#">Dropdown link</a></div>
                                <div class="btn btn-default btn-xs btn-block"><a href="#">Dropdown link</a></div>
                            </ul>
                        </div>
                    </div>
                    <div id="secondary">
                        <ul class="clearfix no-padding">
                            <div class="row " style="margin: auto;">
                                <li><span class="figure">84</span> pens</li>
                                <li><span class="figure">71</span> followers</li>
                            </div>
                            <div class="row " style="margin: auto;">
                                <li><span class="figure">84</span> pens</li>
                                <li><span class="figure">71</span> followers</li>
                            </div>
                            <div class="row " style="margin: auto;">
                                <li><span class="figure">84</span> pens</li>
                                <li><span class="figure">71</span> followers</li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div><!-- /col-md-4 -->
            <div class="col-md-9 text-center  no-padding">
                <div class="row ">
                    <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                        <div class="box1">
                            <span class="li_heart"></span>
                            <h3>933</h3>
                        </div>
                        <p>933 People liked your page the last 24hs. Whoohoo!</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_cloud"></span>
                            <h3>+48</h3>
                        </div>
                        <p>48 New files were added in your cloud storage.</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_stack"></span>
                            <h3>23</h3>
                        </div>
                        <p>You have 23 unread messages in your inbox.</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_news"></span>
                            <h3>+10</h3>
                        </div>
                        <p>More than 10 news were added in your reader.</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_data"></span>
                            <h3>OK!</h3>
                        </div>
                        <p>Your server is working perfectly. Relax &amp; enjoy.</p>
                    </div>

                </div>
                <section class="task-panel tasks-widget">
                    <div class="panel-heading">
                        <div class="pull-left"><h5><i class="fa fa-tasks"></i> Surveys - <span
                                        class="badge bg-info">8</span></h5>

                        </div>
                        <a class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#SurveyModal" href="todo_list.html#">Add New Survey</a>
                        <br>
                    </div>
                    <div class="panel-body">
                        <div class="task-content">

                            <ul class="task-list">
                                <li>
                                    <a class=" btn-block  btn-xs " style="color:#797979;" data-toggle="collapse"
                                       href="#collapse1">
                                        <div class="task-title text-left">
                                            <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                            <span class="badge bg-theme">Done</span>
                                            <span class="caret pull-right"></span>
                                        </div>
                                    </a>
                                    <div id="collapse1" class="task-content row panel-collapsed collapse">
                                        <div class="panel  ">
                                            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad
                                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                                ex ea
                                                commodo consequat.
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-4 col-sm-4 mb">
                                                <!-- REVENUE PANEL -->
                                                <div class="green-panel pn">
                                                    <div class="green-header">
                                                        <h5>REVENUE</h5>
                                                    </div>
                                                    <div class="chart mt">
                                                        <div class="sparkline" data-type="line" data-resize="true"
                                                             data-height="75" data-width="90%" data-line-width="1"
                                                             data-line-color="#fff" data-spot-color="#fff"
                                                             data-fill-color=""
                                                             data-highlight-line-color="#fff" data-spot-radius="4"
                                                             data-data="[200,135,667,333,526,996,564,123,890,464,655]">
                                                            <canvas width="320" height="75"
                                                                    style="display: inline-block; width: 320px; height: 75px; vertical-align: top;"></canvas>
                                                        </div>
                                                    </div>
                                                    <p class="mt"><b>$ 17,980</b><br>Month Income</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 mb">
                                                <div class="darkblue-panel pn">
                                                    <div class="darkblue-header">
                                                        <h5>SITE STATICS</h5>
                                                    </div>
                                                    <h1 class="mt"><i class="fa fa-user fa-3x"></i></h1>
                                                    <p>+ 1,789 NEW VISITS</p>
                                                    <footer>
                                                        <div class="centered">
                                                            <h5><i class="fa fa-trophy"></i> 17,988</h5>
                                                        </div>
                                                    </footer>
                                                </div><!-- -- /darkblue panel ---->
                                            </div>
                                            <div class="col-md-4 col-sm-4 mb">
                                                <div class="panel-group" id="accordion">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                   href="#collapse11">
                                                                    Question 1 text</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse11" class="panel-collapse collapse in">
                                                            <div class="panel-body no-padding">
                                                                <ul class="no-padding col-lg-12  btn-group-vertical btn-group-xs btn-group">
                                                                    <li class="btn btn-xs btn-block ">
                                                                        <span>answer</span>
                                                                    </li>
                                                                    <li class="btn btn-xs btn-block">
                                                                        <span>answer</span>
                                                                    </li>
                                                                    <li class="btn btn-xs btn-block">
                                                                        <span>answer</span>
                                                                    </li>
                                                                    <li class="btn btn-xs btn-block">
                                                                        <span>answer</span>
                                                                    </li>


                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                   href="#collapse2">
                                                                    Collapsible Group 2</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse2" class="panel-collapse collapse">
                                                            <div class="panel-body">Lorem ipsum dolor sit amet,
                                                                consectetur adipisicing elit,
                                                                sed do eiusmod tempor incididunt ut labore et dolore
                                                                magna aliqua. Ut enim ad
                                                                minim veniam, quis nostrud exercitation ullamco laboris
                                                                nisi ut aliquip ex ea
                                                                commodo consequat.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                   href="#collapse3">
                                                                    Collapsible Group 3</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse3" class="panel-collapse collapse">
                                                            <div class="panel-body">Lorem ipsum dolor sit amet,
                                                                consectetur adipisicing elit,
                                                                sed do eiusmod tempor incididunt ut labore et dolore
                                                                magna aliqua. Ut enim ad
                                                                minim veniam, quis nostrud exercitation ullamco laboris
                                                                nisi ut aliquip ex ea
                                                                commodo consequat.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-warning">pending</span>

                                    </div>
                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-important">continue</span>

                                    </div>
                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-important">continue</span>

                                    </div>
                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-important">continue</span>

                                    </div>
                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-important">continue</span>

                                    </div>
                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-important">continue</span>

                                    </div>
                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-important">continue</span>

                                    </div>
                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-important">continue</span>

                                    </div>
                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-important">continue</span>

                                    </div>
                                </li>

                            </ul>
                        </div>

                        <div class=" add-task-row">
                            <a class="btn btn-success btn-sm pull-left" href="todo_list.html#">Add New Tasks</a>
                            <a class="btn btn-default btn-sm pull-right" href="todo_list.html#">See All Tasks</a>
                        </div>
                    </div>
                </section>

            </div>


        </div>


    </div>
@endsection

@include('profiles.surveys.sp.complete')
