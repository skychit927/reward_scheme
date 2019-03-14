@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
                Product type list
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        Name
                    </th>

                    <th>
                        Delete
                    </th>
                </thead>

                <tbody>
                    @if($product_type->count()>0)
                        @foreach($product_type as $product_type)
                            <tr>
                                <td>
                                    <li><a href="{{route('product_types.edit', $product_type->id ) }}" class="btn btn-xs btn-info">{{ $product_type->name }}</a></li>
                                </td>

                                <td>
                                    <a href="{{ route('product_types.delete', $product_type->id ) }}" class="btn btn-xs btn-danger">
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

<button><a href="{{ route('product_types.create') }}">create new product type</a></button>
<br>
<button><a href="{{ route('product_types.trashed') }}">Trashed product type</a></button>

            </table>
        </div>
    </div>



@endsection
