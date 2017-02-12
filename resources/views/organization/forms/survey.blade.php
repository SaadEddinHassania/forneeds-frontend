@extends('layout.profile');

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
                <a href="Projects.html"><span>Projects</span></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Add Survay</span>
            </li>
        </ul>


    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Projects
        <small>Add New Survay</small>
    </h3>

    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-6">
            <form action="#">
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <input type="input" class="form-control" placeholder="Survay Name"> </div>
                <div class="form-group">
                    <label class="control-label">Objective</label>
                    <textarea class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Period</label>
                    <div class="input-group  date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                        <input type="text" class="form-control" name="from">
                        <span class="input-group-addon"> to </span>
                        <input type="text" class="form-control" name="to"> </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Target Criteria</label>
                    <input type="input" class="form-control"> </div>
                <div class="form-group">
                    <label class="control-label">Social Workers</label>
                    <select multiple="" class="form-control">
                        <option>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                        <option>Option 4</option>
                        <option>Option 5</option>
                    </select>
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