@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Update classroom: {{ $classroom->name }}
        </div>
        <div class="card-header">
            Update to Year: {{ $choose_year->name }}
        </div>

        <div class="card-body">
            <form action="{{ route('classrooms.update', $classroom->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" name="_method"  value="PUT">

                {{-- <div class="form-group">
                    <label for="year">Year</label>
                    <select>
                        @foreach($year as $year)
                            <option name=year value="{{ $year->id }}">{{ $year->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value='{{ $classroom->name }}' class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update classroom</button>
                    </div>
                </div>

            </form>
        </div>


    </div>
@endsection
