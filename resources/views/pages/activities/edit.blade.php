@extends('layouts.app')

@section('content')
    <h3 class="page-title">Activity</h3>

    {!! Form::model($activity, ['method' => 'PUT', 'route' => ['admin.activities.update', $activity->id], 'files' => true,]) !!}

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
                    {!! Form::label('event_type_id', 'Activity Type', ['class' => 'control-label']) !!}
                    {!! Form::select('event_type_id', $activity_types, old('event_type_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('event_type_id'))
                        <p class="help-block">
                            {{ $errors->first('event_type_id') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sticker_amount', 'Sticker Amount', ['class' => 'control-label required-label']) !!}
                    {!! Form::number('sticker_amount', old('sticker_amount'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('sticker_amount'))
                        <p class="help-block">
                            {{ $errors->first('sticker_amount') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('image_url', 'Image', ['class' => 'control-label']) !!}
                    @if ($activity->image_url)
                        <a href="{{ asset(env('UPLOAD_PATH').'/'.$activity->image_url) }}" target="_blank">
                            <img src="{{ asset(env('UPLOAD_PATH').'/thumb/'.$activity->image_url) }}">
                        </a>
                    @endif
                    {!! Form::file('image_url', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('image_url_max_size', 2) !!}
                    {!! Form::hidden('image_url_max_width', 4096) !!}
                    {!! Form::hidden('image_url_max_height', 4096) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image_url'))
                        <p class="help-block">
                            {{ $errors->first('image_url') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('detail', 'Detail', ['class' => 'control-label']) !!}
                {!! Form::textarea('detail', old('additional_info'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('detail'))
                    <p class="help-block">
                        {{ $errors->first('detail') }}
                    </p>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('date', 'Date', ['class' => 'control-label']) !!}
                {!! Form::text('date', old('date'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('date'))
                    <p class="help-block">
                        {{ $errors->first('date') }}
                    </p>
                @endif
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('year_id', 'Year', ['class' => 'control-label']) !!}
                    {!! Form::select('year_id', $years, old('year_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('year_id'))
                        <p class="help-block">
                            {{ $errors->first('year_id') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });

            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
        });
    </script>
@stop
