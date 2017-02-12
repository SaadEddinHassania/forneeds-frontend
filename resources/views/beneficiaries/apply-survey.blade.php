@extends('beneficiaries.layout.profile')


@section('content')
    <!-- BEGIN PAGE HEADER-->

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <ul class="page-breadcrumb">
                <li>
                    <a href="Beneficiaries_index.html">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="Beneficiaries_Survays.html">Survays</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Survays Questions</span>
                </li>
            </ul>
        </ul>


    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Survays
        <small>Survay Name</small>
    </h3>

    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-info-circle font-red" aria-hidden="true"></i>
                        <span class="caption-subject font-red sbold uppercase">(Survay Name) details</span>
                    </div>

                </div>
                <div class="portlet-body">

                    <div style="padding:5px"><i>Survay Name :</i>  Name of survay </div>
                    <div style="padding:5px"><i>Survay Objective :</i> Objectives 	</div>
                    <div style="padding:5px"><i>Survay Target Criteria :</i> Criterias </div>
                    <div style="padding:5px"><i>Survay Period :</i> From 12/02/2013 To 01/01/2014 </div>
                    <div style="padding:5px"><i>Survay Social Workers :</i>  Name of social workers</div>
                    <div style="padding:5px"><i class="pull-left">Survay Progress :</i>
                        <span class="easy-pie-chart">
															<div class="number transactions pull-left" data-percent="55" style="display:inline-block;margin-left:10px">
																<span>+55</span>% </div>
														</span>
                        <div style="clear:both"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="">
                        <div class="pull-left"><h4 class="font-red sbold uppercase"><i class="fa fa-list" aria-hidden="true"></i> Survay Questions list</h4></div>

                    </div>

                </div>
                <div class="portlet-body">
                    <div id="MainMenu">
                        <div class="list-group panel">
                            <a href="javascript:;" style="background-color:#DFDFDF" href="#question_a" class="list-group-item" ><i class="fa fa-minus" aria-hidden="true"></i> &nbsp; Question

                            </a>
                            <div class="" id="question_a">
                                <div class="list-group-item" data-toggle="" >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Radio List</label>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label>
                                                            <input type="radio" name="answer1" class="icheck"> Answer 1 </label>
                                                        <label>
                                                            <input type="radio" name="answer2" checked class="icheck"> Answer 1</label>
                                                        <label>
                                                            <input type="radio" name="answer3" class="icheck"> Answer 1 </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div  class="chart draw_question_a" style="height:230px;"> </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <a  href="javascript:;" style="background-color:#DFDFDF" href="#question_b" class="list-group-item"><i class="fa fa-minus" aria-hidden="true"></i>&nbsp; Question B</a>
                            <div class="" id="question_b">
                                <div class="list-group-item" data-toggle="" >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Radio List</label>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label>
                                                            <input type="radio" name="answer1" class="icheck"> Answer 1 </label>
                                                        <label>
                                                            <input type="radio" name="answer2" checked class="icheck"> Answer 1</label>
                                                        <label>
                                                            <input type="radio" name="answer3" class="icheck"> Answer 1 </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div  class="chart draw_question_b" style="height:230px;"> </div>
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


    <div class="clearfix"></div>



@stop