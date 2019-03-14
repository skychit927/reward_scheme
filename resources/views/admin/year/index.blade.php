@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Year choose:
            @if(is_null($choose_year))
            <td>Please choose a year</td>
            @else
            {{ $choose_year ->name}}
            @endif
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        Choose
                    </th>

                    <th>
                        Name
                    </th>

                    <th>
                        Delete
                    </th>
                </thead>

                <tbody>
                    @if($year->count()>0)
                        @foreach($year as $year)
                            <tr>
                                <td>
                                    <a href="{{ route('years.choose', $year->id ) }}" class="btn btn-xs btn-success">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td>

                                <td>
                                    <li><a href="{{route('years.edit', $year->id ) }}" class="btn btn-xs btn-info">{{ $year->name }}</a></li>
                                </td>

                                <td>
                                    <a href="{{ route('years.delete', $year->id ) }}" class="btn btn-xs btn-danger">
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

<button><a href="{{ route('years.create') }}">create new year</a></button>
<br>
<button><a href="{{ route('years.trashed') }}">Trashed year</a></button>

            </table>
        </div>
    </div>



@endsection
