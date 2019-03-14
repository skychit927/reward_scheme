@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
                Activity type list
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        Name
                    </th>

                    <th>
                        Delete
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
                                    <a href="{{ route('activity_types.delete', $activity_type->id ) }}" class="btn btn-xs btn-danger">
                                        <i class="fas fa-trash-alt"></i>
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

<button><a href="{{ route('activity_types.create') }}">create new activity type</a></button>
<br>
<button><a href="{{ route('activity_types.trashed') }}">Trashed activity type</a></button>

            </table>
        </div>
    </div>



@endsection
