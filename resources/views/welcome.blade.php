@extends('layouts.app')
@section("content")

<style>
 
</style>

<div class="container-fluid loginView" id="background">

  <div class="trending-wrapper text-center pt-5">
    @guest
    <h1>Welcome to Kev's eCommerce</h1>
    <a class="btn btn-primary mt-3" href="/login">Click here to log in</a>
    @endguest

    @if(auth()->check())
    <h3>You are already logged in</h3>
    <a href="/products">Click here to view products</a>
    @endif
  </div>
</div>
@endsection