@extends('layouts.app')
@section("content")

<div class="container"> 
@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- enctype to allow image upload on form-->
<form method="POST" action="{{ route('orders.update', $order->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <h1>Edit Order Number: {{ $order->id }} </h1>
    <h2>User ID: {{ $order->user_id }} </h2>
    <br><br>

    <label for="Order" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" name="address" aria-describedby="address" placeholder="Update Address" value="{{ $order->address }}">
    @error('address')
              <span class="text-danger">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

              <label for="payment_status" class="form-label pt-2">Payment Status</label>
              <select class="form-select" aria-label="Default select example" name="payment_status">
  <option selected>{{ $order->payment_status }}</option>
  <option value="Paid">Payment Received</option>

</select>


              <label for="status" class="form-label pt-2">Order Status</label>
              <select class="form-select" aria-label="Default select example" name="status">
              <option selected>{{ $order->status}}</option>
  <option value="Dispatched">Dispatched</option>
</select>
    
<button type="submit" class="btn btn-primary mt-5">Update Order</button>
  </div>



 
</form>
</div>
@endsection