@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Prize Record</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Handler</th>
                        <th>Activity</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Create At</th>
                        <th>Last Update</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.records.prize') !!}';
            window.dtDefaultOptions.columns = [
                {data: 'student.name', name: 'student.name'},
                {data: 'handler.name', name: 'handler.name'},
                {data: 'prize.name', name: 'prize.name'},
                {data: 'total_amount', name: 'total_amount'},
                {data: 'status', name: 'status'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},

                // {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
