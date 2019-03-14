@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Classroom List</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        Year
                    </th>

                    <th>
                        Name
                    </th>

                    <th>
                        Delete
                    </th>
                </thead>

                <tbody>
                    @if($classroom->count()>0)
                        @foreach($classroom as $classroom)
                            <tr>
                                <td>
                                    {{ $classroom->year->name }}
                                </td>

                                <td>
                                    <li><a href="{{route('classrooms.edit',$classroom->id)}}" class="btn btn-xs btn-info">{{ $classroom->name }}</a></li>
                                </td>

                                <td>
                                    <a href="{{ route('classrooms.delete', $classroom->id ) }}" class="btn btn-xs btn-danger">
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

<button><a href="{{ route('classrooms.create') }}">Create new classroom</a></button>

<button><a href="{{ route('classrooms.trashed') }}">Trashed classroom</a></button>


            </table>
        </div>
    </div>

@endsection
