@extends('layouts.app')


@section('content')

<!--Breadcrumb-->
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/products">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Cookers</li>
    </ol>
  </nav>
</div>

<!--Main container for background-->
<div class="container loginView">


  <h1 class="container text-center"><label for="cookers"><strong>Cookers</strong></label></h1>

  <br>


  <!-- Check and display if there are no cookers listed -->
  @if(count($cookers) < 1) <div class="container">
    <div class="alert alert-warning">
      <p class="text-center"><strong>Sorry!</strong> No Cookers Found. </p>
    </div>
</div>

@endif

<!-- Show all Cookers -->
@foreach($cookers as $cooker)
<div class="col d-flex justify-content-center">
  <div class="card mb-3 card border-dark mb-3" style="max-width: 720px;">
    <div class="row g-0">



      <div class="col-md-4">
        <a href="{{ route('products.show', $cooker->id) }}"><img src="/storage/{{ $cooker->image }}" alt="Cooker Image" class="img-fluid rounded-start"></a>
      </div>



      <div class="col-md-8">
        <div class="card-body">
          <a href="{{ route('products.show', $cooker->id) }}">
            <h5 class="card-title">{{ $cooker->name}}</h5>
          </a>
          <p class="card-text"><strong>Price:</strong>£{{ $cooker->price}}</p>
          <p class="card-text"><strong>Description: </strong>{{ $cooker->description}}</p>
          <p class="card-text"><small class="text-bold"><strong>Listed: </strong>{{ $cooker->created_at->diffForHumans()}}</small></p>




        </div>
      </div>

    </div>
  </div>
  <br>
</div> <!-- End Justify content centre-->
@endforeach

<!--Main container closing divs-->
<div class="pagination justify-content-center">

  {{ $cookers->links() }}
</div>
</div>




@endsection