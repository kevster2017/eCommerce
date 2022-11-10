@extends('layouts.app')
@section("content")

<div class="container custom-product"> 

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
  <form action="/placeOrder" method="POST">
    @csrf
  <div class="form-group">
        <textarea name="address" placeholder="Enter your address" class="form-control" id="email"></textarea>
  </div>
  <div class="form-group pt-2">
    <label for="pwd">Payment Method</label><br><br>
    <input type="radio" value="cash" name="payment"><span>Online Payment</span><br><br>
    <input type="radio" value="cash" name="payment"><span>EMI Payment</span><br><br>
    <input type="radio" value="cash" name="payment"><span>Payment on Delivery</span><br><br>
  </div>
  
  <button type="submit" class="btn btn-success">Order Now</button>
</form>
  </div>
    </div>
</div>
@endsection