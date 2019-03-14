@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Update product type: {{ $product_type->name }}
        </div>

        <div class="card-body">
            <form action="{{ route('product_types.update', $product_type->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" name="_method"  value="PUT">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value='{{ $product_type->name }}' class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update product type</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
