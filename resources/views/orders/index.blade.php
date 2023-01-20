@extends('layouts.app')

@section('content')
<div class="container loginView">

  <div class="col-sm-10">
    <div class="trending-wrapper">
      <h3>All Orders</h3>

      @foreach($orders as $order)
      <div class="row searched-item cart-list-divider">
       
        <div class="col-sm-3">
          <div class="">
            <h2>Order ID: {{ $order->id }}</h2>
            <h5>User ID: {{ $order->user_id }}</h5>
            <h5>Product ID: {{ $order->product_id }}</h5>
            <h5>Delivery Status: {{ $order->status }}</h5>
            <h5>Address: {{ $order->address }}</h5>
            <h5>Payment Method: {{ $order->payment_method }}</h5>
            <h5>Payment Status: {{ $order->payment_status }}</h5>
            
<a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">Update order</a>


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