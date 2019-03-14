@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Item Type List</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        Name
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>
                </thead>

                <tbody>
                    @foreach($item_type as $item_type)
                    <tr>

                        <td>
                            {{ $item_type->name }}
                        </td>

                        <td>
                            <a href="{{ route('item_type.edit', ['id' => $item_type->id ]) }}" class="btn btn-xs btn-info">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>

                        <td>
                            <a href="{{ route('item_type.delete', ['id' => $item_type->id ]) }}" class="btn btn-xs btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
