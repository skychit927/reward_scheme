@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Create new item
        </div>

        <div class="card-body">
        <form action="{{ route('inventory.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="item_name">Item Name</label>
                    <input type="text" name="item_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="item_type">Item Type</label>
                    <select name="item_type_id" id="item_type" class="form-control">
                        @foreach($item_type as $item_type)
                    <option value="{{ $item_type->id }}">{{ $item_type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="item_pic">Item Picture</label>
                    <input type="file" name="item_pic" class="form-control">
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" class="form-control">
                </div>
                <div class="form-group">
                    <label for="needed_sticker">Needed Sticker</label>
                    <input type="number" name="needed_sticker" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create new item</button>
                    </div>
                </div>

            </form>
        </div>


    </div>
@endsection
