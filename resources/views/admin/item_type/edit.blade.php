@extends('layouts.app')

@section('content')


    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Update item type: {{ $item_type->name }}
        </div>

        <div class="card-body">
        <form action="{{ route('item_type.update', ['id' => $item_type->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" name="name" value='{{ $item_type->name }}' class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update item type</button>
                    </div>
                </div>

            </form>
        </div>


    </div>
@endsection
