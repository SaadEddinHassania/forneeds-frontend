@extends('layouts.metronic.app')

@push('styles')
<link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/user-card.css" rel="stylesheet" type="text/css"/>
<link href="../assets/to-do.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<style>
    .no-border {
        border: 0;
        box-shadow: none; /* You may want to include this as bootstrap applies these styles too */
    }

    input.transparent-input {
        background-color: rgba(0, 0, 0, 0) !important;
        border: none !important;
    }
</style>
@endpush

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
<script src="js/jquery.form.js"></script>
<script src="/assets/global/plugins/jquery-validation/js/jquery.validate.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-validation/js/additional-methods.min.js"
        type="text/javascript"></script>

@endpush

@push('scripts')

<script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
        type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>


<script src="../assets/pages/scripts/profile.min.js" type="text/javascript"></script>
<script src="../assets/pages/scripts/timeline.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="../js/map_init.js" type="text/javascript"></script>
<script src="../js/location_map_bind.js" type="text/javascript"></script>

@endpush


@section('content')
    {{--<div class="page-content-wrapper">--}}
    <!-- BEGIN CONTENT BODY -->
    {{--<div class="page-content">--}}
    <!-- BEGIN PAGE HEADER-->

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>User</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right">
                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown">
                    Actions
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">
                            <i class="icon-bell"></i> Action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-shield"></i> Another action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-user"></i> Something else here</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <i class="icon-bag"></i> Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> User Profile
        <small></small>
    </h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->

    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="{{url('/profile_image')}}" class="img-responsive" alt=""></div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> {{$user->name}} </div>
                        <div class="profile-usertitle-job"> Service Provider</div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                        <button type="button" class="btn btn-circle red btn-sm">Message</button>
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="{!! Request::is('profile*') ? 'active' : '' !!}">
                                <a href="{!! url('/profile') !!}">
                                    <i class="icon-home"></i> Profile </a>
                            </li>
                            <li class="{!! Request::is('settings*') ? 'active' : '' !!}">
                                <a href="{!! url('/settings') !!}">
                                    <i class="icon-settings"></i> Account Settings </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
                <!-- PORTLET MAIN -->
                <div class="portlet light ">
                    <!-- STAT -->
                    <div class="row list-separated profile-stat">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 37</div>
                            <div class="uppercase profile-stat-text"> Projects</div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 51</div>
                            <div class="uppercase profile-stat-text"> Tasks</div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 61</div>
                            <div class="uppercase profile-stat-text"> Uploads</div>
                        </div>
                    </div>
                    <!-- END STAT -->
                    <div>
                        <h4 class="profile-desc-title">About Marcus Doe</h4>
                        <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <a href="http://www.keenthemes.com">www.keenthemes.com</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-twitter"></i>
                            <a href="http://www.twitter.com/keenthemes/">@keenthemes</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-facebook"></i>
                            <a href="http://www.facebook.com/keenthemes/">keenthemes</a>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->

            <div class="profile-content">
                <div class="col-md-7">
                    <!-- BEGIN PORTLET -->
                    <div class="portlet light col-lg-12">
                        <div class="portlet-title">
                            <div class="caption caption-md">
                                <i class="icon-bar-chart theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">New Need</span>
                                <span class="caption-helper hide">weekly stats...</span>
                            </div>

                        </div>
                        <div class="portlet-body " style="height:400px;padding: 0px;margin: 0px;margin-bottom: 16px;">
                            {!! Form::open(array('route'=>'storeServiceRequest','method'=>'POST', 'files'=>true)) !!}

                            <div class="portlet light form">
                                <div class="portlet-title col-lg-12 text-indent-2">
                                    <div class="form-group">
                                        Sector
                                        <div class="btn-group  btn-group-devided" data-toggle="buttons">
                                            @foreach($sectors as $id=>$sector)
                                                <label class="btn btn-transparent btn-default btn-circle btn-sm">
                                                    {{ Form::radio('sector_id', $id,null,['class'=>'toggle']) }}
                                                    {{$sector}}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px;"></div>
                                            <div>
                                                    <span class="btn default btn-file">
                                                <span class="fileinput-new"> Select image </span>
                                                        <span class="fileinput-exists"> Change </span>
                                                        {!! Form::file('images[]', array('multiple'=>true,'accept'=>"image/*",'class'=>' file ',"data-provides"=>"fileinput")) !!}
                                                    </span>
                                            </div>

                                            <a href="javascript:;" class="btn red fileinput-exists"
                                               data-dismiss="fileinput"> Remove </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            Location
                                            <div class="btn-group  btn-group-devided" data-toggle="buttons">
                                                @foreach($areas as $area)
                                                    <label for="area_id_{{$area->id}}"
                                                           class="btn btn-transparent btn-default btn-circle  btn-sm">
                                                        {{ Form::radio('area_id', $area->id,null,['class'=>'toggle area_id ','id'=>'area_id_'.$area->id,'data-lat'=>$area->lat,'data-lng'=>$area->lng]) }}
                                                        {{$area->name}}
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-12 form-group">

                                        <div id="map" style="height:320px;"></div>
                                        <div style="position:absolute;z-index:99;top:0px;left:0px;"></div>

                                    </div>
                                    <div class="form-group col-lg-12 border-top ">
                                        {!! Form::submit('Submit Need',['class'=>'btn btn-success btn-lg btn-block']) !!}
                                    </div>
                                </div>

                            </div>

                            {!! Form::close()!!}


                        </div>


                    </div>
                </div>
                <!-- END PORTLET -->
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection