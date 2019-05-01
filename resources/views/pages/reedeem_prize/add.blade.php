@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<h3 class="page-title">Reedem Prize</h3>

<div class="panel panel-default">
    {!! Form::open(['method' => 'POST', 'route' => ['admin.redeem_prize.addCart']]) !!}
    {!! Form::hidden('event_id', $id) !!}
    <div class="panel-heading">
        @lang('global.app_edit')
    </div>
    <div class="panel-body table-responsive">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="20%">Name</th>
                        <td field-key='name'>{{ $prize->name }}</td>
                    </tr>
                    <tr>
                        <th width="20%">Prize Type</th>
                        <td field-key='event_type_id'>{{ $prize->event_type ? $prize->event_type->name : '' }}</td>
                    </tr>
                    <tr>
                        <th width="20%">Sticker Amount</th>
                        <td field-key='sticker_amount'>{{ $prize->sticker_amount }}</td>
                    </tr>
                    <tr>
                        <th width="20%">Image</th>
                        <td field-key='image_url'>
                            @if($prize->image_url)
                            <a href="{{ asset(env('UPLOAD_PATH').'/' . $prize->image_url) }}" target="_blank">
                                <img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $prize->image_url) }}"/>
                            </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th width="20%">Detail</th>
                        <td field-key='detail'>{{ $prize->detail }}</td>
                    </tr>
                    {{-- <tr>
                        <th width="20%">Date</th>
                        <td field-key='date'>{{ $prize->date }}</td>
                    </tr> --}}
                    <tr>
                        <th width="20%">Year</th>
                        <td field-key='year_id'>{{ $prize->year ? $prize->year->name : '' }}</td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('qty', 'Quantity ', ['class' => 'control-label required-label']) !!}
                        {!! Form::number('qty', old('qty'), ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'min' => 1]) !!}
                        <p class="help-block"></p>
                        @if($errors->has('qty'))
                            <p class="help-block">
                                {{ $errors->first('qty') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <p>&nbsp;</p>
        <a href="{{ route('admin.prizes.index') }}" class="btn btn-default pull-right">@lang('global.app_back_to_list')</a>
        {!! Form::submit('Add to Cart', ['class' => 'btn btn-danger']) !!}

    </div>
    {!! Form::close() !!}
</div>
@stop

@section('javascript')
@endsection
