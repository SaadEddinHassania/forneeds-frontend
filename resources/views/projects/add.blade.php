
<div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-equalizer font-red-sunglo"></i>
                <span class="caption-subject font-red-sunglo bold uppercase">Project</span>
            </div>
        </div>
        <div>
{{--@include('metronic-templates::common.errors')--}}
</div>
<div class="portlet-body form">
    <div class="row">
        {!! Form::open(['route' => 'storeProject' , "class"=>"project_form"]) !!}

        @include('projects.fields',["marginalizedSituations"=>$marginalizedSituations])

        {!! Form::close() !!}
    </div>
</div>
</div>