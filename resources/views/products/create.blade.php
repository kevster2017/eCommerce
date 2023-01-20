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
<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf

  <div class="mb-3">
    <label for="productName" class="form-label">Product Name</label>
    <input type="text" class="form-control" id="productName" name="name" aria-describedby="productName" placeholder="Enter Product Name" value="{{ old('name') }}">
    @error('name')
              <span class="text-danger">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
    
  </div>

  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price" value=" {{ old('price') }}">
    @error('price')
              <span class="text-danger">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
  </div>

  <div class="mb-3"> 
    <label class="form-label" for="category">Category</label>
    <select class="form-select" aria-label="Default select example" name="category">
  <option selected value="Mobile">Mobile</option>
  <option value="TV">TV</option>
  <option value="Fridge">Fridge</option>
  <option value="Cooker">Cooker</option>
  <option value="Washing Machine">Washing Machine</option>
  <option value="Console">Console</option>
</select>
@error('category')
              <span class="text-danger">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea type="text" class="form-control" id="description" placeholder="Enter Description" name="description"> {{ old('description') }} </textarea> 
    @error('description')
              <span class="text-danger">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
  </div>

  <div class="mb-3">
    <label for="image" class="form-label">Insert Image</label>
    <input type="file" class="form-control" id="image" name="image">
    @error('image')
              <span class="text-danger">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
  </div>

  <button type="submit" class="btn btn-primary">Add Product</button>
</form>
</div>
@endsection