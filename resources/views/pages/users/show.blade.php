@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.users.title')</h3>

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
                            <td field-key='name'>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th width="20%">Classroom</th>
                            <td field-key='classrooms_id'>{{ $user->classroom ? $user->classroom->name : 'Not Applicable' }}</td>
                        </tr>
                        <tr>
                            <th width="20%">Class Number</th>
                            <td field-key='classNo'>{{ $user->classNo }}</td>
                        </tr>
                        <tr>
                            <th width="20%">Role</th>
                            <td field-key='role'>
                                @if ($user->role === 'admin')
                                    Admin
                                @elseif ($user->role === 'teacher')
                                    Teacher
                                @elseif (($user->role === 'student'))
                                    Student
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <p>&nbsp;</p>

            <a href="{{ route('admin.users.index') }}" class="btn btn-default pull-right">@lang('global.app_back_to_list')</a>
            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-info">@lang('global.app_edit')</a>

        </div>
    </div>
@stop


