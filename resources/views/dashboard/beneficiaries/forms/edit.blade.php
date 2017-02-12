@extends('dashboard.layout.dashboard')
@push('page_style_plugins')
<link rel="stylesheet" href="{{asset('/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}">
@endpush

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
                    {!! Form::model($user, [
                                         'id' =>"account-form",
                                         'route'=>['Dashboard.ben.crud.update',$user->citizen->id]
                                     ]) !!}
                    {{ method_field('PATCH') }}

                    {{--<form id="account-form"--}}
                    {{--data-url="{{action('ProfilePageController@postUpdate')}}" role="form"--}}
                    {{--action="#">--}}

                    <div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : ''}}">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Email Field -->
                    <div class="form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : ''}}">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    </div>


                    <div class="form-group col-sm-6 {{ $errors->has('sector_id') ? 'has-error' : ''}}">
                        {!! Form::label('sector_id', 'Sector:') !!}
                        {{ Form::select('citizen[sector_id][]', $sectors,array_keys($citizen->sectors()->pluck('name','id')->toArray()),['class'=>'selectpicker show-tick show-menu-arrow form-control','multiple'=>true,'data-style'=>"btn-default"]) }}
                    </div>
                    <div class="form-group col-sm-6 {{ $errors->has('area_id') ? 'has-error' : ''}}">
                        {!! Form::label('area_id', 'Area:') !!}
                        {{ Form::select('citizen[area_id][]', $areas,array_keys($citizen->areas()->pluck('name','id')->toArray()),['class'=>'selectpicker show-tick show-menu-arrow form-control','multiple'=>true,'data-style'=>"btn-default"]) }}
                    </div>

                    <div class="form-group col-sm-6 {{ $errors->has('marital_status_id') ? 'has-error' : ''}}">
                        {!! Form::label('marital_status_id', 'Marital Status:') !!}
                        {{ Form::select('citizen[marital_status_id]', $maritals,$user->citizen->marital_status_id,['class'=>'selectpicker show-tick show-menu-arrow form-control','data-style'=>"btn-default"]) }}
                    </div>
                    <div class="form-group col-sm-6 {{ $errors->has('age_id') ? 'has-error' : ''}}">
                        {!! Form::label('age_id', 'Age:') !!}
                        {{ Form::select('citizen[age_id]', $ages,$user->citizen->age_id,['class'=>'selectpicker show-tick show-menu-arrow form-control','data-style'=>"btn-default"]) }}
                    </div>
                    <div class="form-group col-sm-6 {{ $errors->has('working_state_id') ? 'has-error' : ''}}">
                        {!! Form::label('working_state_id', 'Labor State:') !!}
                        {{ Form::select('citizen[working_state_id]', $workingstates,$user->citizen->working_state_id,['class'=>'selectpicker show-tick show-menu-arrow form-control','data-style'=>"btn-default"]) }}
                    </div>
                    <div class="form-group col-sm-6 {{ $errors->has('refugee_state_id') ? 'has-error' : ''}}">
                        {!! Form::label('refugee_state_id', 'Refuge State:') !!}
                        {{ Form::select('citizen[refugee_state_id]', $refugee,$user->citizen->refugee_state_id,['class'=>'selectpicker show-tick show-menu-arrow form-control','data-style'=>"btn-default"]) }}
                    </div>
                    <div class="form-group col-sm-6 {{ $errors->has('disability_id') ? 'has-error' : ''}}">
                        {!! Form::label('disability_id', 'Disablity:') !!}
                        {{ Form::select('citizen[disability_id]', $disabilities,$user->citizen->disability_id,['class'=>'selectpicker show-tick show-menu-arrow form-control','data-style'=>"btn-default"]) }}
                    </div>
                    <div class="form-group col-sm-6 {{ $errors->has('academic_level_id') ? 'has-error' : ''}}">
                        {!! Form::label('academic_level_id', 'Academic Level:') !!}
                        {{ Form::select('citizen[academic_level_id]', $academic,$user->citizen->academic_level_id,['class'=>'selectpicker show-tick show-menu-arrow form-control','data-style'=>"btn-default"]) }}
                    </div>


                    <div class="form-group col-sm-6 ">

                        {!! Form::label('contactable', 'Contactable:') !!}

                        <input value="1" type="checkbox" id="contactable" name="citizen[contactable]" class="make-switch "
                               {{$user->citizen->contactable?'checked':''}} data-on-color="success" data-off-color="info">


                    </div>


                    <div class="form-group col-sm-12 margin-top-10">
                        <input type="submit" value="edit" class="btn green"/>
                        <a href="{{route('Dashboard.ben.crud.list')}}" class="btn default"> Cancel </a>
                    </div>
                    {{--</form>--}}
                    {{form::close()}}
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
@endpush