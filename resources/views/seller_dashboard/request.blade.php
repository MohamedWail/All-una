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
  <form action="{{ route('SellerDashboard.submit', $product->id) }}" method="post" >
    @csrf
    @method('PATCH')
    <div class="mb-3">
      <label for="request" class="form-label">Request Comment</label>
      <textarea name="request"class="form-control" id="request" cols="30" rows="5"></textarea>
    </div>
      <div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </form>
</div>

@endsection