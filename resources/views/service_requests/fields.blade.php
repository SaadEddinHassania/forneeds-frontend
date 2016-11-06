

<!-- Sector Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sectors-drop-down', 'Sector :') !!}
    {!! Form::select('sectors-drop-down',array(null=>"Please select sector")+ $sectors, null, ['class' => 'form-control']) !!}
</div>
<!-- Service Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service-type-drop-down', 'Service Type Id:') !!}
    {!! Form::select('service_type_id',array(null=>"Please select a sector")+ array(), null, ['class' => 'form-control','id'=>'service-type-drop-down']) !!}
</div>

@include('formsComponents.location',$areas)

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
        </div>
    </div>
</div>


