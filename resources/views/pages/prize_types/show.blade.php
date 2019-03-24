@extends('layouts.app')

@section('content')
    <h3 class="page-title">Prize Type</h3>

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
                            <td field-key='name'>{{ $prize_type->name }}</td>
                        </tr>
                        <tr>
                            <th width="20%">Sort</th>
                            <td field-key='sort'>{{ $prize_type->sort }}</td>
                        </tr>
                        <tr>
                            <th width="20%">Last Update</th>
                            <td field-key='updated_at'>{{ $prize_type->updated_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <p>&nbsp;</p>

            <a href="{{ route('admin.prize_types.index') }}" class="btn btn-default pull-right">@lang('global.app_back_to_list')</a>
            <a href="{{ route('admin.prize_types.edit', $prize_type->id) }}" class="btn btn-info">@lang('global.app_edit')</a>

        </div>
    </div>
@stop


