@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Activity type List</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        Name
                    </th>
                    <th>
                        Restore
                    </th>
                </thead>

                <tbody>
                        @if($activity_type->count()>0)
                            @foreach($activity_type as $activity_type)
                                <tr>
                                    <td>
                                        <li><a href="{{route('activity_types.edit', $activity_type->id ) }}" class="btn btn-xs btn-info">{{ $activity_type->name }}</a></li>
                                    </td>

                                    <td>
                                        <a href="{{ route('activity_types.restore', $activity_type->id ) }}" class="btn btn-xs btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="5" class="text-center">Empty List</th>
                            </tr>
                        @endif
                    </tbody>

            </table>
        </div>
    </div>

@endsection
