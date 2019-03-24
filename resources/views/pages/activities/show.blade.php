@extends('layouts.app')

@section('content')
    <h3 class="page-title">Activity</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th width="20%">Name</th>
                            <td field-key='name'>{{ $activity->name }}</td>
                        </tr>
                        <tr>
                            <th width="20%">Prize Type</th>
                            <td field-key='event_type_id'>{{ $activity->event_type ? $activity->event_type->name : '' }}</td>
                        </tr>
                        <tr>
                            <th width="20%">Sticker Amount</th>
                            <td field-key='sticker_amount'>{{ $activity->sticker_amount }}</td>
                        </tr>
                        <tr>
                            <th width="20%">Image</th>
                            <td field-key='image_url'>
                                @if($activity->image_url)
                                <a href="{{ asset(env('UPLOAD_PATH').'/' . $activity->image_url) }}" target="_blank">
                                    <img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $activity->image_url) }}"/>
                                </a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th width="20%">Detail</th>
                            <td field-key='detail'>{{ $activity->detail }}</td>
                        </tr>
                        <tr>
                            <th width="20%">Date</th>
                            <td field-key='date'>{{ $activity->date }}</td>
                        </tr>
                        <tr>
                            <th width="20%">Year</th>
                            <td field-key='year_id'>{{ $activity->year ? $activity->year->name : '' }}</td>
                        </tr>
                        <tr>
                            <th width="20%">Last Update</th>
                            <td field-key='updated_at'>{{  \Carbon\Carbon::parse($activity->updated_at)->format('Y/m/d H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <p>&nbsp;</p>

            <a href="{{ route('admin.prizes.index') }}" class="btn btn-default pull-right">@lang('global.app_back_to_list')</a>
            <a href="{{ route('admin.prizes.edit', $activity->id) }}" class="btn btn-info">@lang('global.app_edit')</a>

        </div>
    </div>
@stop


