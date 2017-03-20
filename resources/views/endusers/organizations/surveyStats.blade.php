@extends('endusers.layout.dashboard')
@section('menu')
    @include('endusers.organizations.menu')
@stop

@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
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
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('project_select', 'Project:') !!}
                                        {{ Form::select('project_select', $projects ,array(),['class'=>'selectpicker form-control','data-style'=>"btn-default",'id'=>'project_select']) }}
                                    </div>
                                </div>
                                <div class="form-group  hidden" id="survey_wrapper">
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('survey_select', 'Survey:') !!}
                                        {{ Form::select('survey_select', array() ,array(),['class'=>'selectpicker form-control','data-style'=>"btn-default",'id'=>'survey_select']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row hidden" id="questions_wrapper" >
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
                                <div class="list-group panel" id="questions">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div id="question_template_holder" class="hidden">
            <div class="row question">
                <a href="javascript:;" style="background-color:#DFDFDF" href="" class="list-group-item toggle-holder" ><i class="fa fa-minus" aria-hidden="true"></i> &nbsp; Question

                </a>
                <div class="data-holder" >
                    <div class="list-group-item toggle-target" data-toggle="" >
                        <div class="row">
                            <div class="col-md-6 ">
                                <ol class="answers-list">
                                    <li>Answer</li>
                                    <li>Answer</li>
                                    <li>Answer</li>
                                    <li>Answer</li>
                                </ol>

                            </div>
                            <div class="col-md-6">
                                <div  class="chart draw-canvas " style="height:230px;"> </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>


    </div>

@stop

@push('page_script_plugins')
{!! Charts::assets() !!}

<script>
    $questions = [];
    $('#project_select').on('change',function(e){
        $.get(window.location.origin + "/listings/surveys/val".replace('val',$(this).val()),
            function(data){

                $options  = data.map(function(v){
                    $questions[v.id]=v.questions;
                    $opt = document.createElement('option');
                    $opt.value = v.id;
                    $opt.text  = v.subject;

                    return $opt;
                });
                console.log($options.join(''))
                $('#survey_select').html($options)
                $('#survey_select').selectpicker('destroy');
                $('#survey_select').selectpicker({
                    color: 'blue'
                });
                $('#survey_select').change();
                $('#survey_wrapper').removeClass('hidden');

            })

    });
    $('#survey_wrapper').on('change','#survey_select',function(){
        $('#questions_wrapper').removeClass('hidden');
        $template = $('#question_template_holder');

        $list = ($(this).val() in $questions)? $questions[$(this).val()]: null ;
        $('#questions').html('');
        if($list != null){
            $question_list=	$list.map(function(v){
                var $question = $($template).find('.question').clone(),
                    $link = $($question).find('.toggle-holder'),
                    $data_container = $($question).find('.data-holder').find('.toggle-target');

                $link.html('<i class="fa fa-minus" aria-hidden="true"></i> &nbsp;'+v.body);
                $link.attr('data-question-id',v.id);
                $link.attr('href','#question_'+v.id);
                $data_container.attr('id','question_'+v.id);
                $data_container.data('toggle','question_'+v.id)
                $data_container.find('ol.answers-list').html(v.answers.map(function(answer){
                    return '<li>'+answer.answer+'</li>';
                }));
                $data_container.find('.chart.draw-canvas').attr('data-question-id',v.id);

                return $question;
            });
            $('#questions').append($question_list);
            $charts = $('.chart.draw-canvas');
            $charts.each(function (i, v) {
                var self = $(this);
                $.get("{{route('endusers.org.projects.surveys.questions.chart','val')}}".replace('val',$(this).data('questionId')), function (data) {
                    self.html(data);
                    drawPieChart()

                });
            });
            console.log($charts)


        }

    });

</script>
@endpush