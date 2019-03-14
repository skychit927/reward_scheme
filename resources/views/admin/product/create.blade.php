@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Create new product
            <br>
            Year:
            @if(is_null($choose_year))
            <td>Please choose a year</td>
            @else
            {{ $choose_year ->name}}
            @endif
        </div>


        <div class="card-body">
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                        <label for="pic">Product Picture</label>
                        <input type="file" name="pic" class="form-control">
                    </div>

                <div class="form-group">
                    <label for="type">Product Type</label>
                    <select name="type" id="type" class="form-control">
                        @foreach($product_type as $product_type)
                            <option value="{{ $product_type->id }}">{{ $product_type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="sticker">Sticker</label>
                    <input type="number" name="sticker" class="form-control">
                </div>
                <div class="form-group">
                    <label for="date">date</label>
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create new product</button>
                    </div>
                </div>

            </form>
        </div>


    </div>
@endsection
