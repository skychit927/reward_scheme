@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<h3 class="page-title">Distribution Management</h3>

<div class="panel panel-default">
    <div class="panel-heading">
        @lang('global.app_edit')
    </div>
{!! Form::open(['method' => 'POST', 'route' => ['admin.distribution.add']]) !!}
{!! Form::hidden('student_id', $id) !!}
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('event_id', 'Activity Type', ['class' => 'control-label']) !!}
                {!! Form::select('event_id', $activitys, old('event_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('event_id'))
                    <p class="help-block">
                        {{ $errors->first('event_id') }}
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
{!! Form::submit('Submit', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

@stop

@section('javascript')
@endsection
