@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Update activity type: {{ $activity_type->name }}
        </div>

        <div class="card-body">
            <form action="{{ route('activity_types.update', $activity_type->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" name="_method"  value="PUT">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value='{{ $activity_type->name }}' class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update activity type</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
