@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Products List</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>Year</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Product type</th>
                    <th>Sticker</th>
                    <th>Product date</th>
                    <th>Detele</th>
                </thead>

                <tbody>
                    @if(is_null($product))
                        <tr>
                            <th colspan="5" class="text-center">Empty List</th>
                        </tr>
                    @else
                        @foreach($product as $product)
                            <tr>
                                <td>{{  $product->year_name  }}</td>
                                <td><li><a href="{{route('products.edit', $product->id ) }}" class="btn btn-xs btn-info">{{ $product->name }}</a></li><td>
                                <td><img src="{{ asset($product->pic) }}" alt="{{ $product->pic }}" width="50px" height="50px"></td>
                                <td>{{ $product->event_type_name }}</td>
                                <td>{{ $product->sticker }}</td>
                                <td>{{ $product->date }}</td>
                                <td><a href="{{ route('products.delete', ['id' => $product->id ]) }}" class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
