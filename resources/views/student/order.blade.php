@extends('layouts.app')

@section('content')
    @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif

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
                        <th>Add</th>
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
                                <td>{{ $product->name }}<td>
                                <td><img src="{{ asset($product->pic) }}" alt="{{ $product->pic }}" width="50px" height="50px"></td>
                                <td>{{ $product->event_type_name }}</td>
                                <td>{{ $product->sticker }}</td>
                                <td><a href="{{ route('transactions.addToCart', $product->id) }}"class="btn btn-success pull-right" role="button">Add to Cart</a></td>
                            </tr>

            {{--

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                                    <div class="caption">
                                        <h3>{{ $product->title }}</h3>
                                        <p class="description">{{ $product->description }}</p>
                                        <div class="clearfix">
                                            <div class="pull-left price">${{ $product->price }}</div>
                                            <a href="{{ route('transactions.addToCart', $product->id) }}"
                                               class="btn btn-success pull-right" role="button">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        @endforeach
                        @endif
                    </tbody>

        </div>

@endsection
