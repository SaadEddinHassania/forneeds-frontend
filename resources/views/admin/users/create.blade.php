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
            <div class="row">
                {!! Form::open(['route' => 'admin.users.store']) !!}

                    @include('admin.users.fields')

                 {!! Form::close() !!}
            </div>
        </div>
  </div>
@endsection
