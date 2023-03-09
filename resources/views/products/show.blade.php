@extends('layouts.app')
@section("content")

<div class="container">
    <div class="row pt-5">
        <div class="col-4">
            <img class="img-fluid" src="/storage/{{ $products->image }}">
        </div>
        <div class="col-8">
            <a href="/products">Go Back</a>
            <h2>Category: {{ $products->category }}</h2>
            <h2>{{ $products->name }}</h2>
            <h3>Price: £{{ $products->price }}</h3>
            <h4>Details: {{ $products->description }}</h4>
            <br><br>
            <form action="/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $products->id }}">
                <button class="btn btn-primary mb-2">Add to Cart</button>
            </form>

            <br><br>

            <!-- Hide delete and edit buttons if authenticated user is not an admin -->
            @if(auth()->check() && auth()->user()->is_admin === 1)
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <form action="{{ route('products.destroy', $products->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete Item</button>
                </form>


                <form action="{{ route('products.edit',$products->id) }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-warning ms-2">Edit Item</button>

                </form>
            </div>
            @endif


        </div>
    </div>

</div>
@endsection