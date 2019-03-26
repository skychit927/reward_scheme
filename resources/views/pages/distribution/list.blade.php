@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Distribution Management</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Sticker Classroom</th>
                        <th>Sticker Class Number</th>
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
            window.dtDefaultOptions.ajax = '{!! route('admin.distribution.list') !!}';
            window.dtDefaultOptions.columns = [
                {data: 'name', name: 'name'},
                {data: 'classroom.name', name: 'classroom.name'},
                {data: 'classNo', name: 'classNo'},
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
