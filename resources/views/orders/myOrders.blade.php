@extends('layouts.app')
@section("content")

<div class="container">

  <div class="col-sm-10">
    <div class="container">
      <h1 class="text-center pb-3">My Orders</h1>

      @foreach($orders as $order)
      <div class="container">
        <div class="col-sm-3">

          <img class="trending-img" src="/storage/{{ $order->image }}">

        </div>
        <div class="col-sm-3">
          <div class="">
            <h2>Name: {{ $order->name }}</h2>
            <h5>Delivery Status: {{ $order->status }}</h5>
            <h5>Address: {{ $order->address }}</h5>
            <h5>Payment Status: {{ $order->payment_status }}</h5>
            <h5>Payment Method: {{ $order->payment_method }}</h5>
            <h5>Order Placed: {{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</h5>
            <h5>Order Updated: {{ \Carbon\Carbon::parse($order->updated_at)->diffForHumans() }}</h5>

          </div>

        </div>

      </div>
      @endforeach
    </div>

  </div>
  <div class="pagination justify-content-center">
    {{ $orders->links() }}
  </div>
</div>
@endsection