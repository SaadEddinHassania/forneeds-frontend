<style>
    fieldset.scheduler-border {
        border: 1px groove #ddd !important;
        border-left: none !important;
        border-right: none !important;
        border-bottom: none !important;

        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow: 0px 0px 0px 0px #000;
        box-shadow: 0px 0px 0px 0px #000;
    }

    legend.scheduler-border {
        font-size: .9em !important;
        font-weight: bold !important;
        text-align: left !important;
        width: auto;
        padding: 0 10px;
        border-bottom: none;
    }
</style>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
@if(!$update)
    <!-- Password Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('password_confirmation', 'Confirm password:') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
@endif
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Optional</legend>
    <div class="form-group">
        User Type
        <div class="btn-group  btn-group-devided" data-toggle="buttons">
            @foreach($user->getUserTypes() as $id=>$type)
                <?php $str = 'is_' . $type;$condition = isset($user->$str) && ($user->$str);?>

                <label class="btn btn-transparent btn-default btn-circle btn-sm">
                    {!! Form::checkbox('user_type[]',0,$condition ?'checked':'',[
                    'class'=>'make-switch btn-sm',
                    'data-off-color'=>'success',
                    'data-on-text'=>'revoke',
                    'data-off-text'=>'Grant '.$type,
                    'data-on-color'=>'info']) !!}
                </label>
            @endforeach
        </div>

    </div>
</fieldset>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{{route('Dashboard.admin.crud.list')}}" class="btn default"> Cancel </a>
        </div>
    </div>
</div>
