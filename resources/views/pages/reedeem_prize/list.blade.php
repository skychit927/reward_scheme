@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Reedem Prize</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable">
                <thead>
                    <tr>
                            <th>Name</th>
                            <th>Prize Type</th>
                            <th>Sticker Amount</th>
                            <th>Image</th>
                            {{-- <th>Detail</th> --}}
                            {{-- <th>Date</th> --}}
                            <th>Year</th>
                            <th>Last Update</th>
                            <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.redeem_prize.list') !!}';
            window.dtDefaultOptions.columns = [
                {data: 'name', name: 'name'},
                {data: 'event_type.name', name: 'event_type.name'},
                {data: 'sticker_amount', name: 'sticker_amount'},
                {data: 'image_url', name: 'image_url'},
                // {data: 'detail', name: 'detail'},
                // {data: 'date', name: 'date'},
                {data: 'year.name', name: 'year.name'},
                {data: 'updated_at', name: 'updated_at'},

                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
