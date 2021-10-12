@extends('layouts.sellermaster')

@section('content')

@if (count($errors) > 0)
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li >
                  <div class="alert alert-danger" role="alert">
                    {{ $error }}
                  </div>
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="my-5" style="width: 50%">
  <form action="{{ Route('SellerDashboard.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Product Name</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
      <label for="name_ar" class="form-label">Product Name Arabic</label>
      <input type="text" class="form-control" id="name_ar" name="name_ar">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea name="description"class="form-control" id="description" cols="30" rows="5"></textarea>
    </div>
    <div class="mb-3">
      <label for="description_ar" class="form-label">Description Arabic</label>
      <textarea name="description_ar"class="form-control" id="description_ar" cols="30" rows="5"></textarea>
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select class="form-select" aria-label="Default select example" name="category_id">
        <option selected>Choose Category</option>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="start_price" class="form-label">Start Bidding Price</label>
      <input type="number" min="0" class="form-control" id="start_price" name="start_price">
    </div>
    <div class="mb-3">
      <label for="duration" class="form-label">Duration</label>
      <select class="form-select" aria-label="Default select example" name="duration">
        <option selected>Choose Duration</option>
        <option value="3">3 Days</option>
        <option value="5">5 Days</option>
        <option value="7">7 Days</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="product_image" class="form-label">Product Image</label>
      <input type="file" class="form-control"  name="product_image[]" multiple>
    </div>
    <div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

@endsection