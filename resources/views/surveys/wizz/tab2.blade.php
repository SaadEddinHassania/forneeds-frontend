<!--add question-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-red-sunglo"></i>
            <span class="caption-subject font-red-sunglo bold uppercase">Add Questions</span>
        </div>
    </div>
    <div>
{{--        @include('metronic-templates::common.errors')--}}
    </div>
    <div id="question-handler" class="portlet-body form">
        <div class="row">


            <div class="question-wrapper col-lg-12">
            {!! Form::open(['route' => 'storeQuestions' ,'class'=>'question_form']) !!}
{{--            {!! Form::open(['route' => 'profile' ,'class'=>'question_form']) !!}--}}
            <!-- Survey Id Field -->

                {!! Form::hidden('survey_id',null, ['class' => 'form-control curr-survey']) !!}


                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Question</span>
                    </div>
                </div>
                <div class="form-group col-sm-12"></div>

                <!-- Body Field -->
                <div class="col-lg-12">
                    <div class="form-group col-sm-12 ">

                        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '5','placeholder'=>"Ask Your Question..."]) !!}
                    </div>
                    <!-- Order Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::selectRange('order',1,100,null, ['class' => 'form-control','placeholder'=>"Choose Order...",'title'=>'how questions are ordered in a page']) !!}
                    </div>
                    <!-- Order Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::selectRange('step',1,100,null, ['class' => 'form-control','placeholder'=>"Choose step...",'title'=>'how questions are split among pages']) !!}
                    </div>
                </div>


                <!-- Submit Field -->
                <div class="form-group col-sm-12">

                </div>
                <!--add answer-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-equalizer font-red-sunglo"></i>
                            <span class="caption-subject font-red-sunglo bold uppercase">Add Answers</span>
                        </div>
                    </div>
                    <div>
{{--                        @include('metronic-templates::common.errors')--}}
                    </div>
                    <div class="portlet-body form">
                        <div class="row">
                            <div class="col-lg-12">


                                <div class="row answer-wrapper">


                                    <!-- Answer Field -->
                                    <div class="form-group col-sm-8 ">
                                        {!! Form::text('answer[]', null, ['class' => 'form-control','placeholder'=>'Add An Answer..']) !!}
                                    </div>

                                    <!-- Order Field -->
                                    <div class="form-group col-sm-4">
                                        {!! Form::selectRange('answer[order][]',1,100,null, ['class' => 'form-control','placeholder'=>"Choose Order...",'title'=>'how answers are ordered']) !!}
                                    </div>

                                </div>
                                <div class="col-lg-12">

                                    <a id="add_answer" href="javascript:void()"
                                       class="btn btn-lg btn-block glyphicon glyphicon-plus-sign"></a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <button id="add_question" class="btn btn-lg btn-block glyphicon glyphicon-plus-sign"></button>

                </div>
            </div>
            <!-- Submit Field -->
            <div class="form-group col-sm-12">
                <div class="form-actions">
                    <div class="row  col-md-offset-0">
                        {!! Form::submit('Finish', ['class' => 'btn green  btn-outline questions-submit']) !!}

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
