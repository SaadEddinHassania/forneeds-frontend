@extends('dashboard.layout.dashboard')


@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" style="background-color:#fff">
            <!-- BEGIN PAGE HEADER-->

            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Beneficiaries</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Edit Beneficiary</span>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Edit Beneficiary
                <small></small>
            </h3>

            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-6">
                    <form action="#">
                        @include('dashboard.admin.forms.fields')

                        <div class="margin-top-10">
                            <a href="javascript:;" class="btn green"> edit </a>
                            <a href="{{route('Dashboard.admin.crud.list')}}" class="btn default"> Cancel </a>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>

@stop
