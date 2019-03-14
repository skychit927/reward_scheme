@extends('layouts.app')

@section('content')


    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Update product: {{ $product->name }}
        </div>

        <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" name="_method"  value="PUT">

                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" name="name" value='{{ $product->name }}' class="form-control">
                </div>

                <div class="form-group">
                        <label for="pic">Product Picture</label>
                        <input type="file" name="pic" value='{{$product->pic}}'class="form-control">
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
                    <input type="number" name="sticker" value='{{ $product->sticker }}'  class="form-control">
                </div>
                <div class="form-group">
                    <label for="date">date</label>
                    <input type="date" name="date" value='{{ $product->date }}' class="form-control">





                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update item type</button>
                    </div>
                </div>

            </form>
        </div>


    </div>
@endsection
