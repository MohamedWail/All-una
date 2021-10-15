@extends('layouts.master')

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
  <form action="{{ route('CategoryStore') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="category_name" class="form-label">Category Name</label>
      <input type="text" class="form-control" id="category_name" name="name">
    </div>
      <div class="mb-3">
        <label for="category_image" class="form-label">Category Image</label>
        <input type="file" class="form-control"  name="path_of_image">
      </div>
      <div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </form>
</div>

@endsection