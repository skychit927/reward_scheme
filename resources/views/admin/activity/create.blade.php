@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Create new activity
            <br>
            Year:
            @if(is_null($choose_year))
            <td>Please choose a year</td>
            @else
            {{ $choose_year ->name}}
            @endif
        </div>


        <div class="card-body">
        <form action="{{ route('activities.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Activity Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                        <label for="pic">Activity Picture</label>
                        <input type="file" name="pic" class="form-control">
                    </div>

                <div class="form-group">
                    <label for="type">Activity Type</label>
                    <select name="type" id="type" class="form-control">
                        @foreach($activity_type as $activity_type)
                            <option value="{{ $activity_type->id }}">{{ $activity_type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="sticker">Sticker</label>
                    <input type="number" name="sticker" class="form-control">
                </div>
                <div class="form-group">
                    <label for="date">date</label>
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create new activity</button>
                    </div>
                </div>

            </form>
        </div>


    </div>
@endsection
