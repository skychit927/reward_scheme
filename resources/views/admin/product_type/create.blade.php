@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Create new product type
        </div>

        <div class="card-body">
        <form action="{{ route('product_types.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Product Type</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create new product type</button>
                    </div>
                </div>

            </form>
        </div>


    </div>
@endsection
