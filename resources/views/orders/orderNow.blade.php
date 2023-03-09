@extends('layouts.app')
@section("content")

<div class="container">

  <div class="col-sm-10">
    <table class="table table-bordered">

      <tbody>
        <tr>
          <td>Amount</td>
          <td>£{{$total}}</td>

        </tr>
        <tr>
          <td>Tax</td>
          <td>£0</td>

        </tr>
        <tr>
          <td>Delivery</td>
          <td>£10</td>
        </tr>
        <tr>
          <td>Total Amount</td>
          <td>£{{$total+10}}</td>
        </tr>

      </tbody>
    </table>
    <div>
      <form action="/orders/placeOrder" method="POST">
        @csrf
        <input type="hidden" value="{{ auth()->user()->name }}" name="name">

        <div class="form-group mb-3">
          <textarea name="address" placeholder="Enter your address" class="form-control" id="address"></textarea>
          @error('address')
          <span class="text-danger">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <input type="radio" value="Online" name="payment"><span> Online Payment</span><br><br>

        <!-- Alternative payment types
    <input type="radio" value="EMI" name="payment"><span> EMI Payment</span><br><br>
    <input type="radio" value="Cash" name="payment"><span> Cash on Delivery</span><br><br>
-->


        <button type="submit" class="btn btn-success">Order Now</button>
      </form>
    </div>
  </div>
</div>
@endsection