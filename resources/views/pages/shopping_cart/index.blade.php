@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<h3 class="page-title">Redeem Prize Request</h3>
<div class="panel panel-default">
    <div class="panel-heading">
        Request List
    </div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped ajaxTable">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Prize</th>
                    <th>Request Time</th>
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
        window.dtDefaultOptions.ajax = '{!! route('admin.shopping.show') !!}';
        window.dtDefaultOptions.columns = [
            {data: 'student.name', name: 'student.name'},
            {data: 'prize.name', name: 'prize.name'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
        ];
        processAjaxTables();
    });
</script>
@endsection


