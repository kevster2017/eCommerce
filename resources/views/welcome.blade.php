@extends('layouts.app')
@section("content")

<div class="container loginView"> 



<div class="trending-wrapper">
    @guest
      <h3>Welcome to Kev's eCommerce</h3>
     <a href="/login">Click here to log in</a>
     @endguest

     @if(auth()->check())
     <h3>You are already logged in</h3>
     <a href="/products">Click here to view products</a>
     @endif
    </div>
</div>
@endsection