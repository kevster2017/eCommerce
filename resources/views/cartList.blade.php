@extends('layouts.app')
@section("content")

<div class="container custom-product"> 

<div class="col-sm-10"> 
<div class="trending-wrapper">
      <h3>Result for Products</h3>
     <a class="btn btn-success" href="orderNow">Order Now</a>
      @foreach($products as $product)
      <div class="row searched-item cart-list-divider">
        <div class="col-sm-3">
        <a href="show/{{ $product->id }}">
      <img class="trending-img" src="{{ $product->image }}">
      
      </a>
        </div>
        <div class="col-sm-3">
            <div class="">
        <h2>{{ $product->name }}</h2>
        <h5>{{ $product->description }}</h5>
        
      </div>
      </a>
        </div>
        <div class="col-sm-3">
        <a href="/removeCart/{{ $product->cart_id}}" class="btn btn-warning">Remove from Cart</a>
        </div>
      
    </div>
@endforeach
</div>
<a class="btn btn-success" href="orderNow">Order Now</a>
    </div>
</div>
@endsection