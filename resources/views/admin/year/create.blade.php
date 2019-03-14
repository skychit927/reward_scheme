@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Create new year
        </div>

        <div class="card-body">
        <form action="{{ route('years.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Year</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create new year</button>
                    </div>
                </div>

            </form>
        </div>


    </div>
@endsection
