@extends('layouts.app')
@section("content")

<div class="container custom-product"> 

<div class="col-sm-10"> 
<div class="trending-wrapper">
      <h3>My Orders</h3>
    
      @foreach($orders as $order)
      <div class="row searched-item cart-list-divider">
        <div class="col-sm-3">
        <a href="show/{{ $order->id }}">
      <img class="trending-img" src="{{ $order->image }}">
      
      </a>
        </div>
        <div class="col-sm-3">
            <div class="">
        <h2>Name: {{ $order->name }}</h2>
        <h5>Delivery Status: {{ $order->status }}</h5>
        <h5>Address: {{ $order->address }}</h5>
        <h5>Payment Status: {{ $order->payment_status }}</h5>
        <h5>Payment Method: {{ $order->payment_method }}</h5>

        
      </div>
      </a>
        </div>
        
      
    </div>
@endforeach
</div>

    </div>
</div>
@endsection