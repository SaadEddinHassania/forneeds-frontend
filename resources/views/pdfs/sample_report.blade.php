@extends("layouts.pdf")

@section('content')
    <section class="task-panel portlet light no-margin tasks-widget">
        <div class=" portlet-heading">
            <div class="pull-left"><h5><i class="fa fa-tasks"></i> Surveys - <span
                            class="badge bg-info">8</span></h5>

            </div>
\            <br>
        </div>
        <div class="portlet-body">
            <div class="task-content">

                <ul class="task-list col-md-12">
                    @foreach($surveys as $survey)

                        <li class="page">
                            <div class="row col-lg-12">
                                <a class=" btn-block   btn-lg"
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
                                     class="task-content row panel-collapse collapse in">
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
                                                             class="panel-collapse collapse in"
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
                        <br>
                    @endforeach
                </ul>
            </div>

            <div style="padding:5px;" class="row  col-sm-offset add-task-row">

            </div>
        </div>
    </section>

@stop

