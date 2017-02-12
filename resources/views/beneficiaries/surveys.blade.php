@extends('beneficiaries.layout.profile')

@section('content')

    <!-- BEGIN PAGE HEADER-->

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="Beneficiaries_index.html">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Survays</span>
            </li>
        </ul>



    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Survays
    </h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Survay name </th>
                    <th> Start Time </th>
                    <th> End Time </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td> 1 </td>
                    <td><a href="survay-questions.html"> Survay A</a></td>
                    <td> 01/01/2015 </td>
                    <td> 01/01/2016 </td>

                </tr>
                <tr>
                    <td> 2 </td>
                    <td><a href="survay-questions.html"> Survay B</a></td>
                    <td> 01/01/2015 </td>
                    <td> 01/01/2016 </td>
                </tr>
                <tr>
                    <td> 3 </td>
                    <td><a href="survay-questions.html"> Survay C</a></td>
                    <td> 01/01/2015 </td>
                    <td> 01/01/2016 </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="clearfix"></div>


@stop