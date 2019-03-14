@extends('layouts.app')

@section('content')


    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Update activity: {{ $activity->name }}
        </div>

        <div class="card-body">
        <form action="{{ route('activities.update', $activity->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" name="_method"  value="PUT">

                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" name="name" value='{{ $activity->name }}' class="form-control">
                </div>

                <div class="form-group">
                        <label for="pic">Activity Picture</label>
                        <input type="file" name="pic" value='{{$activity->pic}}'class="form-control">
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
                    <input type="number" name="sticker" value='{{ $activity->sticker }}'  class="form-control">
                </div>
                <div class="form-group">
                    <label for="date">date</label>
                    <input type="date" name="date" value='{{ $activity->date }}' class="form-control">





                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update item type</button>
                    </div>
                </div>

            </form>
        </div>


    </div>
@endsection
