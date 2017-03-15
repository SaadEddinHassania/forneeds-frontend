@extends('dashboard.layout.dashboard')
@push('page_style_plugins')
<link rel="stylesheet" href="{{asset('/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}">
<link rel="stylesheet" href="{{asset('/assets/cdn/materialize.min.css')}}"/>
@endpush
@section('content')

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Beneficiaries</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Statistics</span>

                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Beneficiaries
            <small>Statistics</small>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">

                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1_1" data-toggle="tab"> Ordinary Charts </a>
                    </li>
                    <li>
                        <a href="#tab_1_2" data-toggle="tab"> Table Charts </a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tab_1_1">
                        <div class="form-group">
                            {!! Form::open(['route'=>'Dashboard.ben.stats.post','class'=>'charts-form'])!!}
                            <div class="form-group col-sm-10">
                                {!! Form::label('sector_id', 'Theme:') !!}
                                {{Form::select('theme',$libs,null,['class'=>'select2me show-tick show-menu-arrow form-control','data-style'=>"btn-default"]) }}
                                <div class="input-group">
                                    <div class="icheck-list">
                                        {!! Form::label('attr_list', 'Attribute List:') !!}
                                        @foreach($target_types as $key=>$property)
                                            <div class="disp    form-group col-sm-2">
                                                {!! Form::label('attr_list', ucwords(str_replace(['_id','_'],' ',$property)).':',['class'=>'btn-block']) !!}
                                                {{Form::radio('attr_list',$key ,null,['data-size'=>"mini",'data-name'=>ucwords(str_replace(['_id','_'],' ',$property)),'class'=>'make-switch switch-radio1'])}}
                                            </div>
                                        @endforeach


                                    </div>
                                </div>


                            </div>
                            <div id="targets_wrapper" class="disp  margin-top-20  form-group col-sm-2">
                                <div class="form-actions">
                                    <input type="submit" class="btn btn blue" value="Draw">
                                </div>
                            </div>

                            <div class="center form-group text-left  margin-top-10">
                                {{--<input type="submit" class="btn btn blue" value="Draw">--}}

                            </div>

                            </form>


                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_1_2">
                        <div class="form-group">
                            {!! Form::open(['route'=>'Dashboard.ben.stats.post','class'=>'charts-form'])!!}
                            <div class="form-group col-sm-10">
                                {!! Form::label('sector_id', 'Theme:') !!}
                                {{Form::select('theme',$multi_libs,null,['class'=>'select2me show-tick show-menu-arrow form-control','data-style'=>"btn-default"]) }}
                                <input type="hidden" name="multi" value="true">


                            </div>
                            <div class="form-group col-sm-10">
                                {!! Form::label('attr_list', 'X indicator:') !!}
                                {{Form::select('attr_list[x]',$target_types ,null,['class'=>'select2me show-tick show-menu-arrow form-control','data-style'=>"btn-default",'id'=>'attr_list_x'])}}
                            </div>
                            <div class="form-group col-sm-10">
                                {!! Form::label('attr_list', 'Y indicators:') !!}

                                <select name="attr_list[y][]" id="attr_list_y"
                                        class="selectpicker show-tick show-menu-arrow form-control"
                                        multiple>
                                    @foreach($target_types_m as $key=>$property)

                                        <optgroup id="opt_{{str_replace('\\','-',$property['base'])}}"
                                                  label="{{ucwords(str_replace('_',' ',snake_case(class_basename($property['base'])))).':'}}"
                                                  data-max-options="1">
                                            @foreach($property['val'] as $pKey=>$val)
                                                <option value="{{$property['base'].'#'.$pKey}}">{{$val}}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach

                                </select>

                            </div>

                            <div id="targets_wrapper" class="disp  margin-top-20  form-group col-sm-2">
                                <div class="form-actions">
                                    <input type="submit" class="btn btn blue" value="Draw">
                                </div>
                            </div>

                            <div class="center form-group text-left  margin-top-10">
                                {{--<input type="submit" class="btn btn blue" value="Draw">--}}

                            </div>

                            </form>


                        </div>
                    </div>


                </div>

            </div>
            <div class="col-md-12 charts-canvas hidden">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">Pio Chart based on <span
                                        class="attribute_name">(<span id="chart-label"></span>)</span></span>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <div class="chart draw_chart ">


                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="clearfix"></div>


    </div>
    <div id="target_handler" style="display:none;">
        <div class="form-group col-sm-12 ">
            {{ Form::select('target',array(),null,['class'=>'form-control']) }}
        </div>
    </div>

@stop
@push('page_script_plugins')
<script src="{{asset('/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script src="{{asset('/assets/pages/scripts/components-bootstrap-switch.min.js')}}"></script>

{!! Charts::assets() !!}

<script>
    function setLabel($val) {
        $('#chart-label').text($val);
    }
    $(function () {
        $('.icheck-list input[type=radio]').on('switchChange.bootstrapSwitch', function (e) {

            e.preventDefault();
            e.stopPropagation();
            $('.charts-canvas').removeClass('hidden').fadeIn();
            $form = $(this).closest('form');
            setLabel($(this).data('name'));
            $('div.chart.draw_chart').html(' <center>\r\ <div class=\"preloader-wrapper big active\" style=\"margin-top: {{ ($chart->settings()['height'] / 2) - 32 }}px;\">\r\n                                    <div class=\"spinner-layer spinner-blue-only\">\r\n                                        <div class=\"circle-clipper left\">\r\n                                            <div class=\"circle\"><\/div>\r\n                                        <\/div>\r\n                                        <div class=\"gap-patch\">\r\n                                            <div class=\"circle\"><\/div>\r\n                                        <\/div>\r\n                                        <div class=\"circle-clipper right\">\r\n                                            <div class=\"circle\"><\/div>\r\n                                        <\/div>\r\n                                    <\/div>\r\n                                <\/div>\r\n                            <\/center>');

            $.post($form.attr('action'), $form.serialize(), function (data) {

                $('div.chart.draw_chart').html(data);
            });

        });
        $('form.charts-form').submit(function (e) {
            e.preventDefault();
            e.stopPropagation();
            $('.charts-canvas').removeClass('hidden').fadeIn();
            $.post($(this).attr('action'), $(this).serialize(), function (data) {

                $('div.chart.draw_chart').html(data);

            });
        });
        var charts = {!! json_encode($libs) !!};

        $('#attr_list_x').on('change', function (e) {
            $('#attr_list_y optgroup').prop('disabled', function (i, v) {
                console.log(v ? !v : v);
                return v ? !v : v;
            });
            console.log($('#opt_' + $(this).val()).prop('disabled', true).prop('disabled'))

            $('#attr_list_y option').prop('selected', function() {
                return this.defaultSelected;
            });

            $('#attr_list_y').selectpicker('destroy');
            $('#attr_list_y').selectpicker({
                style: 'blue'
            });
            ;

        });
//        $('.icheck-list input[type=radio]').on('switchChange.bootstrapSwitch', function ($event, $state) {
//            $event.preventDefault();
//            $select_val = this.value;
//            console.log(this.value);
//            $.get(document.location.origin + "/gateways/listings/" + $select_val,
//                null,
//                function (data) {
//                    var $list = $('#target_handler>div').clone()
//                        , $selectName = $select_val.split('-');
//                    $list.children('select').prop('name', 'target' + '[' + $select_val + '][]')
//
//                    $selectName = $selectName[$selectName.length - 1];
//                    $list.children('select').append("<option value='' selected='selected' disabled='disabled'>Please select " + $selectName.charAt(0).toUpperCase() + $selectName.slice(1) + "</option>");
//                    console.log(data);
//                    $.each(data, function (index, element) {
//                        $list.children('select').append("<option value='" + index + "'>" + element + "</option>");
//                    });
//                    $("#targets_wrapper").removeClass('hidden');
//
//                    $('#targets_wrapper>div.form-actions').html($list);
//                });
//        });

    })
</script>
@endpush