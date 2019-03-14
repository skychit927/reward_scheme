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
                        Image
                    </th>
                    <th>
                        Stock
                    </th>
                    <th>
                        Needed Sticker
                    </th>
                    <th>
                        Item Type
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>
                </thead>

                <tbody>
                    @foreach($inventory as $inventory)
                    <tr>

                        <td>
                            {{ $inventory->item_name }}
                        </td>

                        <td>
                            <img src="{{ asset($inventory->item_pic) }}" alt="{{ $inventory->item_name }}" width="50px" height="50px">
                        </td>

                        <td>
                            {{ $inventory->stock }}
                        </td>

                        <td>
                            {{ $inventory->needed_sticker }}
                        </td>

                        <td>
                            {{ $inventory->item_type }}
                        </td>

                        <td>
                            <a href="{{ route('inventory.edit', ['id' => $inventory->id ]) }}" class="btn btn-xs btn-info">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>

                        <td>
                            <a href="{{ route('inventory.delete', ['id' => $inventory->id ]) }}" class="btn btn-xs btn-danger">
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
