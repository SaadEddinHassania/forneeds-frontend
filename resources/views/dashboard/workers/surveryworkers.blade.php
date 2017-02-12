@extends('dashboard.layout.dashboard')

@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Dashborad</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="Database_SocialWorkers.html">Social Workers</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="Monitor_evaluate.html">Monitoring and Evaluation</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Progress For Social Workers</span>

                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Monitoring and Evaluation
            <small>Social Workers By Name</small>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-red bold uppercase"><i class="fa fa-info-circle"
                                                                                     aria-hidden="true"></i> Details</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-group">
                            <i>Organization : </i>
                            <span> Organization Name </span>
                        </div>
                        <div class="form-group">
                            <i>Project : </i>
                            <span> Project Name </span>
                        </div>
                        <div class="form-group">
                            <i>Survay : </i>
                            <span> Survay Name </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th> #</th>
                        <th> Table heading</th>
                        <th> Table heading</th>
                        <th> Table heading</th>
                        <th> Table heading</th>
                        <th> Table heading</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> 1</td>
                        <td> Table cell</td>
                        <td> Table cell</td>
                        <td> Table cell</td>
                        <td> Table cell</td>
                        <td> Table cell</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn blue btn-sm btn-outline dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="inbox.html">
                                            <i class="fa fa-commenting-o" aria-hidden="true"></i> Send Message</a>
                                    </li>
                                    <li>
                                        <a href="{{route('Dashboard.work.payment')}}">
                                            <i class="fa fa-money" aria-hidden="true"></i> Payment</a>
                                    </li>
                                </ul>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td> 2</td>
                        <td> Table cell</td>
                        <td> Table cell</td>
                        <td> Table cell</td>
                        <td> Table cell</td>
                        <td> Table cell</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn blue btn-sm btn-outline dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="inbox.html">
                                            <i class="fa fa-commenting-o" aria-hidden="true"></i> Send Message</a>
                                    </li>
                                    <li>
                                        <a href="add-payment.html">
                                            <i class="fa fa-money" aria-hidden="true"></i> Payment</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> 3</td>
                        <td> Table cell</td>
                        <td> Table cell</td>
                        <td> Table cell</td>
                        <td> Table cell</td>
                        <td> Table cell</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn blue btn-sm btn-outline dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="inbox.html">
                                            <i class="fa fa-commenting-o" aria-hidden="true"></i> Send Message</a>
                                    </li>
                                    <li>
                                        <a href="{{route('Dashboard.work.payment')}}">
                                            <i class="fa fa-money" aria-hidden="true"></i> Payment</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="clearfix"></div>


    </div>
    <!-- END CONTENT BODY -->
@stop