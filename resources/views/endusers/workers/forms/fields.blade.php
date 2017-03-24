
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user[name]', 'Name:') !!}
    {!! Form::text('user[name]', old('user[name]'), ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user[email]', 'Email:') !!}
    {!! Form::email('user[email]', old('user[email]'), ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user[password]', 'Password:') !!}
    {!! Form::password('user[password]', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('user[password_confirmation]', 'Confirm password:') !!}
    {!! Form::password('user[password_confirmation]', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    <select class="selectpicker show-tick show-menu-arrow form-control"
            data-style="btn-default" name="sector_id[]" data-placeholder="Sectors"
            placeholder="select sector" multiple>
        <option value="" selected disabled>Sectors</option>
        @foreach($sectors as $id=>$name)
            <option {{ ( in_array ($id,is_null(old("sector_id"))?[]:old("sector_id")) ? "selected":"") }} value="{{$id}}">{{$name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-6">
    <select class="selectpicker show-tick show-menu-arrow form-control"
            data-style="btn-default" name="area_id[]" multiple
            placeholder="choose Company">
        <option value="" selected disabled>Areas</option>
        @foreach($areas as $id=>$name)
            <option {{ (in_array ($id,is_null(old("area_id"))?[]:old("area_id"))  ? "selected":"") }} value="{{$id}}">{{$name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    <select class="selectpicker show-tick show-menu-arrow form-control"
            data-style="btn-default" name="marital_status_id"
            placeholder="choose Marial">
        <option value="" selected disabled>Marital status</option>
        @foreach($maritals as $id=>$name)
            <option {{ (old("marital_status_id") == $id ? "selected":"") }} value="{{$id}}">{{$name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    <select class="selectpicker show-tick show-menu-arrow form-control"
            data-style="btn-default" name="age_id"
            placeholder="choose Marial">
        <option value="" selected disabled>Age</option>
        @foreach($ages as $id=>$name)
            <option {{ (old("age_id") == $id ? "selected":"") }} value="{{$id}}">{{$name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    <select class="selectpicker show-tick show-menu-arrow form-control"
            data-style="btn-default" name="working_state_id"
            placeholder="Choose Working State">
        <option value="" selected disabled>working State</option>
        @foreach($workingstates as $id=>$name)
            <option {{ (old("working_state_id") == $id ? "selected":"") }} value="{{$id}}">{{$name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-6">
    <select class="selectpicker show-tick show-menu-arrow form-control"
            data-style="btn-default" name="refugee_state_id"
            placeholder="Choose Working State">
        <option value="" selected disabled>Refugee State</option>
        @foreach($refugee as $id=>$name)
            <option {{ (old("refugee_state_id") == $id ? "selected":"") }} value="{{$id}}">{{$name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-6">
    <select class="selectpicker show-tick show-menu-arrow form-control"
            data-style="btn-default" name="disability_id"
            placeholder="Choose Working State">
        <option value="" selected disabled>Disability</option>
        @foreach($disabilities as $id=>$name)
            <option {{ (old("disability_id") == $id ? "selected":"") }} value="{{$id}}">{{$name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    <select class="selectpicker show-tick show-menu-arrow form-control"
            data-style="btn-default" name="academic_level_id"
            placeholder="Choose Working State">
        <option value="" selected disabled>Academic Level</option>
        @foreach($academic as $id=>$name)
            <option  {{ (old("academic_level_id") == $id ? "selected":"") }} value="{{$id}}">{{$name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group  col-md-6">
    {!! Form::label('contactable', 'Contactable:') !!}

    <input value="1" type="checkbox" id="contactable" name="contactable" class="make-switch" checked data-on-color="info" data-off-color="success">

</div>