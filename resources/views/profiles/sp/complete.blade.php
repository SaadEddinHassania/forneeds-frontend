@extends('layouts.choose')
@push('styles')
<style>
    .selectpicker .btn:hover {
        background: #398439 !important;
        text-decoration: none;
    }
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>

@endpush
@section('content')

    <div class="col-lg-8 " style="position: absolute;right: 28px;">
        <div class="uk-block ">
            <div class="row uk-margin-large-top">
                <div class=" col-md-push-1 animate-box fadeInRight animated-fast " style="margin-top: 67px;"
                     data-animate-effect="fadeInRight">
                    <row>
                        <div class="form-panel">
                            <style>
                                .btn.dropdown-toggle.btn-default:hover,
                                .btn.dropdown-toggle.btn-default:active,
                                .btn.dropdown-toggle.btn-default:target {
                                    background: #eee !important;
                                    color: #aaa;
                                }

                                .btn.dropdown-toggle.bs-placeholder.btn-default {
                                    background: #eee !important;
                                    color: #131313;
                                }
                            </style>
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Service Provider Required fields</h4>
                            <form class="form-horizontal style-form" method="post" action="{{route('newSp')}}">
                                {{csrf_field()}}
                                <div class="form-group">

                                    <select class="selectpicker show-tick show-menu-arrow form-control"
                                            data-style="btn-default" name="sector_id[]" data-placeholder="Sectors"
                                            placeholder="select sector" multiple>
                                        <option value="" selected disabled>Sectors</option>

                                        @foreach($sectors as $id=>$name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="selectpicker show-tick show-menu-arrow form-control"
                                            data-style="btn-default" name="company_id" placeholder="choose Company">
                                        <option value="" selected disabled>Companies</option>
                                        @foreach($companies as $id=>$name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="selectpicker show-tick show-menu-arrow form-control"
                                            data-style="btn-default" name="area_id[]" multiple
                                            placeholder="choose Company">
                                        <option value="" selected disabled>Areas</option>
                                        @foreach($areas as $id=>$name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Mission Statement</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="mission_statement"
                                                  class="form-control text-center round-form"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="mobile_number"
                                               class="form-control text-center round-form">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="phone_number"
                                               class="form-control text-center round-form">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Fax</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="fax"
                                               class="form-control text-center round-form">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Website</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="website"
                                               class="form-control text-center round-form">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Contact Person Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="contact_person_title"
                                               class="form-control text-center round-form">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Contact Person Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="contact_person"
                                               class="form-control text-center round-form">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3 pull-right ">
                                        <button type="submit" value="" class="form-control text-center round-form">
                                            <span class="uk-text-bold">Proceed To Profile</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </row>
                </div>

            </div>
        </div>
    </div>

@endsection
