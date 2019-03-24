@extends('layouts.app')

@section('content')
    <h3 class="page-title">Prize Type</h3>

    {!! Form::model($prize_type, ['method' => 'PUT', 'route' => ['admin.prize_types.update', $prize_type->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name', ['class' => 'control-label required-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sort', 'Sort', ['class' => 'control-label required-label']) !!}
                    {!! Form::text('sort', 'prize', ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'disabled' => '']) !!}
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
@stop
