@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Create new activity type
        </div>

        <div class="card-body">
        <form action="{{ route('activity_types.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Activity Type</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create new activity type</button>
                    </div>
                </div>

            </form>
        </div>


    </div>
@endsection
