@extends('layout.profile')

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
                <a href="survay-view.html"><span>Survay</span></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Add Question</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="pull-right">
                <a href="javascript:;" class="btn blue" id="new-question"><i class="fa fa-plus" aria-hidden="true"></i> Add new question</a>
            </div>
        </div>


    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Survays
        <small>Add New Question</small>
    </h3>

    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-6">
            <form action="#">
                <div class="portlet light portlet-fit bordered question_container">
                    <div class="portlet-body">
                        <div class="form-group">
                            <label class="control-label">Question Text</label>
                            <input type="input" class="form-control" placeholder="Question"> </div>
                        <div class="form-group">
                            <label class="control-label">Answer</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="answer text" name="answer[]">
                                <span class="input-group-btn">
																<button class="btn blue add-answer" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
																</span>
                            </div>
                        </div>

                    </div>
                </div>




                <div class="margin-top-10">
                    <a href="javascript:;" class="btn green"> Add </a>
                    <a href="javascript:;" class="btn default"> Cancel </a>
                </div>
            </form>
        </div>
    </div>


    <div class="clearfix"></div>



@stop