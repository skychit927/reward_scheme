@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Student Sticker Record</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Sticker Amount</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.records.sticker') !!}';
            window.dtDefaultOptions.columns = [
                {data: 'name', name: 'name'},
                {data: 'sticker_amount', name: 'sticker_amount'},
                // {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
