@extends('layouts.app')

@section('content')
<!--Breadcrumb-->
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/products">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">All Orders</li>
    </ol>
  </nav>
</div>
<h1 class="text-center mb-3"><label for="allOrders" class="form-label"><strong>All Orders</strong></label></h1>

<div class="container mt-5 d-flex justify-content-center">
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th scope="col">Order ID</th>
        <th scope="col">Product ID</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Payment Method</th>
        <th scope="col">Payment Status</th>
        <th scope="col">Status</th>
        <th scope="col">Order Placed</th>
        <th scope="col">Update Order</th>
        <th scope="col">Order Updated</th>

      </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
      <tr>
        <th scope="row">{{ $order->id }}</a></th>
        <td>{{ $order->product_id }}</td>
        <td>{{ $order->name }}</td>
        <td>{{ $order->address }}</td>
        <td>{{ $order->payment_method }}</td>
        <td>{{ $order->payment_status }}</td>
        <td>{{ $order->status }}</td>
        <td>{{ date('d-m-Y', strtotime($order->created_at));  }}</td>
        <td> <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary my-2">Update order</a></td>
        <td>{{ date('d-m-Y', strtotime($order->updated_at)); }}</td>


      </tr>
      @endforeach


    </tbody>
  </table>



</div>
<div class="pagination justify-content-center">
  {{ $orders->links() }}
</div>

@endsection