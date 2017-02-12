@extends('organization.layout.profile')

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
                <span>Projects</span>

            </li>
        </ul>
        <div class="page-toolbar">
            <div class="pull-right">
                <a href="add-project.html" class="btn blue"><i class="fa fa-plus" aria-hidden="true"></i> Add New
                    Project</a>
            </div>
        </div>

    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Services Providers
        <small>Projects</small>
    </h3>

    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th> #</th>
                    <th> Project Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $key => $project)

                    <tr>
                        <td> {{$key}} </td>
                        <td><a href="project-view.html"> {{$project}} </a></td>
                        <td><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><a>
                                    <a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i><a>
                        </td>

                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>


    <div class="clearfix"></div>


    </div>
    <!-- END CONTENT BODY -->

@stop