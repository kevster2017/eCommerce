@extends('layouts.app')


@section('content')

<!--Breadcrumb-->
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/products">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">TVs</li>
    </ol>
  </nav>
</div>

<!--Main container for background-->
<div class="container loginView">
 

    <h1 class="container text-center"><label for="tvs"><strong>TVs</strong></label></h1>

      <br>


    <!-- Check and display if there are no trades listed -->
    @if(count($tvs) < 1) <div class="container">
      <div class="alert alert-warning">
        <p class="text-center"><strong>Sorry!</strong> No TVs Found. </p>
      </div>
  </div>

  @endif

  <!-- Show all TVs -->
  @foreach($tvs as $tv)
  <div class="col d-flex justify-content-center">
    <div class="card mb-3 card border-dark mb-3" style="max-width: 720px;">
      <div class="row g-0">


       
        <div class="col-md-4">
          <a href="{{ route('products.show', $tv->id) }}"><img src="/storage/{{ $tv->image }}" alt="TV Image" class="img-fluid rounded-start"></a>
        </div>
       


        <div class="col-md-8">
          <div class="card-body">
            <a href="{{ route('products.show', $tv->id) }}">
              <h5 class="card-title">{{ $tv->name}}</h5>
            </a>
            <p class="card-text"><strong>Price:</strong>£{{ $tv->price}}</p>
            <p class="card-text"><strong>Description: </strong>{{ $tv->description}}</p>
            <p class="card-text"><small class="text-bold"><strong>Listed: </strong>{{ $tv->created_at->diffForHumans()}}</small></p>



          
          </div>
        </div>

      </div>
    </div>
    <br>
  </div> <!-- End Justify content centre-->
  @endforeach

  <!--Main container closing divs-->
  <div class="pagination justify-content-center">

    {{ $tvs->links() }}
  </div>
</div>




@endsection