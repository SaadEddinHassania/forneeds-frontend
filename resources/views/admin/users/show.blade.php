@extends('admin.layouts.app')

@section('content')
     <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-equalizer font-red-sunglo"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">User</span>
                </div>
            </div>
            <div>
                @include('admin.errors')
            </div>
            <div class="portlet-body form">
                <div class="row" style="padding-left: 20px">
                   @include('admin.users.show_fields')
                   <a href="{!! route('admin.users.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
@endsection
