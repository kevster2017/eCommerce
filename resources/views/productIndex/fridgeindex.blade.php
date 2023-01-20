@extends('layouts.app')


@section('content')

<!--Breadcrumb-->
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/products">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Fridges</li>
    </ol>
  </nav>
</div>

<!--Main container for background-->
<div class="container loginView">
 

    <h1 class="container text-center"><label for="Fridges"><strong>Fridges</strong></label></h1>

      <br>


    <!-- Check and display if there are no trades listed -->
    @if(count($fridges) < 1) <div class="container">
      <div class="alert alert-warning">
        <p class="text-center"><strong>Sorry!</strong> No Fridges Found. </p>
      </div>
  </div>

  @endif

  <!-- Show all Fridges -->
  @foreach($fridges as $fridge)
  <div class="col d-flex justify-content-center">
    <div class="card mb-3 card border-dark mb-3" style="max-width: 720px;">
      <div class="row g-0">


       
        <div class="col-md-4">
          <a href="{{ route('products.show', $fridge->id) }}"><img src="/storage/{{ $fridge->image }}" alt="Fridge Image" class="img-fluid rounded-start"></a>
        </div>
       


        <div class="col-md-8">
          <div class="card-body">
            <a href="{{ route('products.show', $fridge->id) }}">
              <h5 class="card-title">{{ $fridge->name}}</h5>
            </a>
            <p class="card-text"><strong>Price:</strong>£{{ $fridge->price}}</p>
            <p class="card-text"><strong>Description: </strong>{{ $fridge->description}}</p>
            <p class="card-text"><small class="text-bold"><strong>Listed: </strong>{{ $fridge->created_at->diffForHumans()}}</small></p>



          
          </div>
        </div>

      </div>
    </div>
    <br>
  </div> <!-- End Justify content centre-->
  @endforeach

  <!--Main container closing divs-->
  <div class="pagination justify-content-center">

    {{ $fridges->links() }}
  </div>
</div>




@endsection