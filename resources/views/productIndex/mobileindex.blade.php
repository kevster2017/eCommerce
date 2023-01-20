@extends('layouts.app')


@section('content')

<!--Breadcrumb-->

<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/products">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Mobiles</li>
    </ol>
  </nav>
</div>


<!--Main container for background-->
<div class="container loginView">


  <h1 class="container text-center"><label for="mobiles"><strong>Mobiles</strong></label></h1>

  <br>


  <!-- Check and display if there are no trades listed -->
  @if(count($mobiles) < 1) <div class="container">
    <div class="alert alert-warning">
      <p class="text-center"><strong>Sorry!</strong> No Mobiles Found. </p>
    </div>
</div>

@endif

<!-- Show all TVs -->
@foreach($mobiles as $mobile)
<div class="col d-flex justify-content-center">
  <div class="card mb-3 card border-dark mb-3" style="max-width: 720px;">
    <div class="row g-0">



      <div class="col-md-4">
        <a href="{{ route('products.show', $mobile->id) }}"><img src="/storage/{{ $mobile->image }}" alt="TV Image" class="img-fluid rounded-start"></a>
      </div>



      <div class="col-md-8">
        <div class="card-body">
          <a href="{{ route('products.show', $mobile->id) }}">
            <h5 class="card-title">{{ $mobile->name}}</h5>
          </a>
          <p class="card-text"><strong>Price:</strong>£{{ $mobile->price}}</p>
          <p class="card-text"><strong>Description: </strong>{{ $mobile->description}}</p>
          <p class="card-text"><small class="text-bold"><strong>Listed: </strong>{{ $mobile->created_at->diffForHumans()}}</small></p>




        </div>
      </div>

    </div>
  </div>
  <br>
</div> <!-- End Justify content centre-->
@endforeach

<!--Main container closing divs-->
<div class="pagination justify-content-center">

  {{ $mobiles->links() }}
</div>
</div>




@endsection