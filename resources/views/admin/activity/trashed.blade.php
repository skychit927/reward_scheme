@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">Activities List</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>Year</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Activity type</th>
                    <th>Sticker</th>
                    <th>Activity date</th>
                    <th>Restore</th>
                </thead>

                <tbody>
                    @if(is_null($activity))
                        <tr>
                            <th colspan="5" class="text-center">Empty List</th>
                        </tr>
                    @else
                        @foreach($activity as $activity)
                            <tr>
                                <td>{{  $activity->year_name  }}</td>
                                <td><li><a href="{{route('activities.edit', $activity->id ) }}" class="btn btn-xs btn-info">{{ $activity->name }}</a></li><td>
                                <td><img src="{{ asset($activity->pic) }}" alt="{{ $activity->pic }}" width="50px" height="50px"></td>
                                <td>{{ $activity->event_type_name }}</td>
                                <td>{{ $activity->sticker }}</td>
                                <td>{{ $activity->date }}</td>
                                <td><a href="{{ route('activities.restore', $activity->id ) }}" class="btn btn-xs btn-success"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
