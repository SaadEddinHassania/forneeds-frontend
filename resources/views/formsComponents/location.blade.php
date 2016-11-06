



<div style="width:100%;height:400px" class="form-group col-sm-6">
    {{--{!! Mapper::render() !!}--}}
</div>
<div class="row">
    <div class="dropdown col-lg-12">
        <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-flat" data-target="#" href="/page.html">
            الموقع <span class="caret"></span>
        </a>
        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
            <li><a href="#">Some action</a></li>
            <li><a href="#">Some other action</a></li>
            <li class="divider"></li>
            <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Hover me for more options</a>
                <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="#">Second level</a></li>
                    <li class="dropdown-submenu">
                        <a href="#">Even More..</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">3rd level</a></li>
                            <li><a href="#">3rd level</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Second level</a></li>
                    <li><a href="#">Second level</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
{{--<!-- Area Id Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('area-drop-down', 'Area') !!}--}}
    {{--{!! Form::select('area_id',array(null => 'Please select one option') +($areas),null, ['class' => 'form-control','place_holder'=>'Area','id'=>'area-drop-down']) !!}--}}
{{--</div>--}}

{{--<!-- City Id Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('city_id', 'City') !!}--}}
    {{--{!! Form::select('city_id',array(null=>"Please select an Area")+ array(),null, ['class' => 'form-control','place_holder'=>'Area','id'=>'city-drop-down']) !!}--}}
{{--</div>--}}
{{--<!-- District Id Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('district_id', 'District') !!}--}}
    {{--{!! Form::select('district_id',array(null=>"Please select a City")+ array(),null, ['class' => 'form-control','place_holder'=>'Area','id'=>'district-drop-down']) !!}--}}
{{--</div>--}}
{{--<!-- Street Id Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('street_id', 'Street') !!}--}}
    {{--{!! Form::select('street_id',array(null=>"Please select a District")+ array(),null, ['class' => 'form-control','place_holder'=>'Area','id'=>'street-drop-down']) !!}--}}
{{--</div>--}}
