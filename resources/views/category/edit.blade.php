@extends('layouts.master')

@section('content')
  <div class="my-5" style="width: 50%">
    <form action="{{ route('CategoryUpdate', $category->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
      </div>
      <div>
        <label for="path_of_image" class="form-label">Category Image</label>
        <input type="file" class="form-control"  name="path_of_image">
        <img style="width: 15%;" src="{{URL::asset($category->path_of_image)}}">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection