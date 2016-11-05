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

    <div class="col-lg-5 " style="position: absolute;right: 28px;">
        <div class="uk-block ">
            <div class="row uk-margin-large-top">
                <div class=" col-md-push-1 animate-box fadeInRight animated-fast" style="margin-top: 100px;"
                     data-animate-effect="fadeInRight">
                    <row>
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Citizen Required fields</h4>
                            <form class="form-horizontal style-form" method="get">
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
                                            data-style="btn-default" name="area_id[]" multiple
                                            placeholder="choose Company">
                                        <option value="" selected disabled>Areas</option>
                                        @foreach($areas as $id=>$name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="selectpicker show-tick show-menu-arrow form-control"
                                            data-style="btn-default" name="_id[]" multiple
                                            placeholder="choose Marial">
                                        <option value="" selected disabled>Marital status</option>
                                        @foreach($maritals as $id=>$name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Rounder</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control text-center round-form">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Rounder</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control text-center round-form">
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
