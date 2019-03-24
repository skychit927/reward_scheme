@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Prize Type</h3>
    @if ($premission != 'readOnly')
    <p>
        <a href="{{ route('admin.prize_types.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p>
    @endif
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.prize_types.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.prize_types.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @if ( request('show_deleted') != 1 ) dt-select @endif">
                <thead>
                    <tr>
                        @if ( request('show_deleted') != 1 )
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endif

                        <th>Name</th>
                        <th>Sort</th>
                        <th>Last Update</th>
                        @if( request('show_deleted') == 1 )
                            <th>&nbsp;</th>
                        @else
                            <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.prize_types.mass_destroy') }}'; @endif
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.prize_types.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                {data: 'name', name: 'name'},
                {data: 'sort', name: 'sort'},
                {data: 'updated_at', name: 'updated_at'},

                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
