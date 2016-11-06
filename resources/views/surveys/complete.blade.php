


        <div class="portlet light " id="form_wizard_1">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-red"></i>
                    <span class="caption-subject font-red bold uppercase">
                                            <span class="step-title"> Step 1 of 4 </span>
                                        </span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-cloud-upload"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-wrench"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-trash"></i>
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                    <div id="form_wizard_1" class="form-wizard">
                        <div class="form-body">
                            <ul class="nav nav-pills nav-justified steps">
                                <li class="active">
                                    <a href="#tab1" data-toggle="tab" class="step first" aria-expanded="true">
                                        <span class="number"> 1 </span>
                                        <span class="desc">
                                                                <i class="fa fa-check"></i> Survey Details </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab" class="step">
                                        <span class="number"> 2 </span>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> Add Questions</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#tab3" data-toggle="tab" class="step last">
                                    <a href="#tab3" data-toggle="tab" class="step last">
                                        <span class="number"> 3 </span>
                                        <span class="desc">
                                                                <i class="fa fa-check"></i> Targeting Mechanism </span>
                                    </a>
                                </li>
                            </ul>
                            <div id="bar" class="progress progress-striped" role="progressbar">
                                <div class="progress-bar progress-bar-success" style="width: 25%;"></div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-content">
                                    <div class="alert alert-danger display-none" style="display: none;">
                                        <button class="close" data-dismiss="alert"></button>
                                        You have some form errors. Please check below.
                                    </div>
                                    <div class="alert alert-success display-none" style="display: none;">
                                        <button class="close" data-dismiss="alert"></button>
                                        Your form validation is successful!
                                    </div>
                                    <div class="tab-pane active" id="tab1">
                                        @include("surveys.wizz.tab1")
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        @include("surveys.wizz.tab2")

                                    </div>

                                    <div class="tab-pane " id="tab3">

                                        @include("surveys.wizz.tab3")

                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                          {{--      <a href="javascript:;" class="btn default button-previous disabled"
                                                   style="display: none;">
                                                    <i class="fa fa-angle-left"></i> Back </a>

                                                <a href="javascript:;" class="btn green button-submit" style="display: none;">
                                                    Submit
                                                    <i class="fa fa-check"></i>
                                                </a>--}}
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
            </div>
        </div>


        @push('styles')
<link href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
<script src="http://malsup.github.com/jquery.form.js"></script>
<script src="/assets/survey_widget.js" type="text/javascript"></script>
<script src="/assets/pages/scripts/form-wizard.js"></script>
<script src="/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-validation/js/jquery.validate.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js" type="text/javascript"></script>



<script src="/assets/pages/scripts/components-date-time-pickers.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
@endpush