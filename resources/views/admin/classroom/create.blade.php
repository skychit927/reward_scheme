@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')


    <div class="card">
        <div class="card-header">
            Create new classroom
            <br>
            Year:
            @if(is_null($choose_year))
            <td>Please choose a year</td>
            @else
            {{ $choose_year ->name}}
            @endif
        </div>

        <div class="card-body">
            <form action="{{ route('classrooms.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Classroom</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" name= "submit">Create new room</button>
                    </div>
                </div>

            </form>
        </div>


    </div>
@endsection
