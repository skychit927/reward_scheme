@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Product type List</div>
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
                        @if($product_type->count()>0)
                            @foreach($product_type as $product_type)
                                <tr>
                                    <td>
                                        <li><a href="{{route('product_types.edit', $product_type->id ) }}" class="btn btn-xs btn-info">{{ $product_type->name }}</a></li>
                                    </td>

                                    <td>
                                        <a href="{{ route('product_types.restore', $product_type->id ) }}" class="btn btn-xs btn-info">
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
