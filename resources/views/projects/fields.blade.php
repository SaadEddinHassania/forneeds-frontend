<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<!-- Service Provider Id Field -->
{!! Form::hidden('service_provider_id', $sp->id, ['class' => 'form-control']) !!}
<!-- sponsor Field -->
<div class="form-group col-sm-6 ">
    {!! Form::label('sponsor', 'Sponsor:') !!}
    {!! Form::text('sponsor', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>


<!-- sponsor Field -->
<div class="form-group col-sm-12 col-lg-12">
    <div class="row">
        <div class="col-md-3">
            <div tabindex="2" class="btn default projectRange">
                <i class="fa fa-calendar"></i> &nbsp;
                <span> </span>
                <b class="fa fa-angle-down"></b>
            </div>
        </div>
    </div>
{!! Form::hidden('starts_at', null, ['class' => 'form-control','placeholder'=>'Starts At','id'=>'starts_at']) !!}
<!-- Expires At Field -->
    {!! Form::hidden('etxpires_at', null, ['class' => 'form-control','placeholder'=>'Expires At','id'=>'expires_at']) !!}
</div>
<div class="form-group col-sm-12 col-lg-12">
    {{ Form::select('sector_id',$sectors,null,['class'=>'form-control']) }}
</div>
<div class="form-group col-sm-12 col-lg-12">
    {{ Form::select('area_id',$areas,null,['class'=>'form-control']) }}
</div>
<div class=" form-group form-actions">
    <div class="col-lg-8 form-group">
        {{ Form::select('target',$target_types,null,['id'=>'add_target_slct','class'=>'form-control no-padding','placeholder'=>'Target type']) }}
    </div>
    <div class="col-lg-3 form-group">
        <a id="add_target_btn" class=" btn-lg  glyphicon glyphicon-plus-sign"></a>
    </div>
</div>

<div id="targets_wrapper" class="disp  form-group col-sm-12">
    <div class="form-actions">

    </div>
</div>


<div id="target_handler" style="display:none;">
    <div class="form-group col-sm-12 col-lg-12">
        {{ Form::select('target',array(),null,['class'=>'form-control']) }}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('admin.projects.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
