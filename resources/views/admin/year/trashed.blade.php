@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Year List</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        Name
                    </th>
                    <th>
                        Restore
                    </th>
                </thead>

                <tbody>
                        @if($year->count()>0)
                            @foreach($year as $year)
                                <tr>
                                    <td>
                                        <li><a href="{{route('years.edit', $year->id ) }}" class="btn btn-xs btn-info">{{ $year->name }}</a></li>
                                    </td>

                                    <td>
                                        <a href="{{ route('years.restore', $year->id ) }}" class="btn btn-xs btn-info">
                                            <i class="fas fa-pencil-alt"></i>
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

            </table>
        </div>
    </div>

@endsection
