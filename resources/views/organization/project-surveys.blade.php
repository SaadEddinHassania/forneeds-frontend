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
                <a href="Projects.html"><span>Projects</span></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Project Name</span>
            </li>
        </ul>


    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Projects
        <small>Project Name</small>
    </h3>

    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-info-circle font-red" aria-hidden="true"></i>
                        <span class="caption-subject font-red sbold uppercase">Project Name details</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <div style="padding:5px"><i>Project Name :</i>  Name of project </div>
                    <div style="padding:5px"><i>Project Sectors :</i> Education 	</div>
                    <div style="padding:5px"><i>Project Donor :</i> Donor Name </div>
                    <div style="padding:5px"><i>Project Period :</i> From 12/02/2013 To 01/01/2014 </div>
                    <div style="padding:5px"><i>Project Beneficiaries :</i> </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="">
                        <div class="pull-left"><h4 class="font-red sbold uppercase"><i class="fa fa-list" aria-hidden="true"></i> Survays list</h4></div>
                        <div class="pull-right">
                            <a href="add-survay.html" class="btn blue"><i class="fa fa-plus" aria-hidden="true"></i> Add New Survay</a>
                        </div>
                    </div>

                </div>
                <div class="portlet-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Survay Name</th>
                            <th>status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td> 1 </td>
                            <td><a href="survay-view.html"> Survay1 </a></td>
                            <td>Complete</td>

                        </tr>
                        <tr>
                            <td> 2 </td>
                            <td><a href="survay-view.html"> Survay2</a></td>
                            <td>Ongoing
                            </td>
                        </tr>
                        <tr>
                            <td> 3 </td>
                            <td><a href="survay-view.html"> Survay3 </a></td>
                            <td>Pending
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    <div class="clearfix"></div>



@stop