@extends('layouts.settings')

@push('styles')
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

<link rel="stylesheet" href="css/bootstrap.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

<link rel="stylesheet" href="css/citizen-style-default.css">
<link rel="stylesheet" href="css/citizen-style.css">
<link href="css/style-responsive.css" rel="stylesheet">
<link rel="stylesheet" href="css/user-card.css">
<link rel="stylesheet" href="css/to-do.css">
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
<script src="js/service-requests-widget.js"></script>
@endpush
@section('content')
    <li>
        <a class=" btn-block  btn-xs " style="color:#797979;" data-toggle="collapse"
           href="#collapse2">
            <div class="task-title text-left">
                <span class="task-title-sp">Citizen Settings</span>

                <span class="caret pull-right"></span>
            </div>
        </a>
        <div id="collapse2" class="task-content row panel-collapsed collapse">
            <div class="col-md-6 ">
                <div class="panel ">
                    <div class="panel-body ">
                        <i class=" fa fa-bars">&nbsp&nbsp</i>
                        <span class="text-capitalize">here you can edit your Citizen details</span>
                    </div>

                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Account</h4>
                        <form class="form-horizontal style-form" method="get">
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Account</h4>
                        <form class="form-horizontal style-form" method="get">
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Account</h4>
                        <form class="form-horizontal style-form" method="get">
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </li>
@endsection