@extends('endusers.layout.dashboard')
@push('page_style_plugins')
<link rel="stylesheet" href="{{asset('/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}">
<link rel="stylesheet"
      href="{{asset('/dashboard/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}">

@endpush
@section('menu')
    @include('endusers.organizations.menu')
@stop
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" style="background-color:#fff">
            <!-- BEGIN PAGE HEADER-->

            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{route('endusers.org.projects.surveys.show',$survey_id)}}">Questions</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>New Question</span>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> New Question
                <small></small>
            </h3>

            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">

                <div class="col-md-7">
                    {!! Form::open(['route' => 'endusers.org.projects.surveys.questions.store']) !!}

                    @include('endusers.organizations.forms.questions.fields',['update'=>false])

                    {!! Form::close() !!}
                </div>
                <div class="col-md-5">
                    @include('flash::message')

                    @include('dashboard.layout.errors')
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>

@stop
@push('page_script_plugins')
<script src="{{asset('/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script src="{{asset('/assets/pages/scripts/components-bootstrap-switch.min.js')}}"></script>
<script src="{{asset('/assets/global/plugins/moment.min.js')}}"></script>
<script src="{{asset('/dashboard/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}"></script>
<script src="{{asset('/dashboard/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
@endpush