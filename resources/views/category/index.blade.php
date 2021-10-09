@extends('layouts.master')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Category Table
        <a  href="{{ route('CategoryCreate') }}" 
            class="btn btn-success a-btn-slide-text">
            <span><strong>Add Category</strong></span>
        </a>  
    </div>
    <div class="card-body table-responsive">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Edit/Delete</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Edit/Delete</th>
                </tr>
            </tfoot>
            @foreach ($categories as $category )
                <tbody>
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td><img style="width: 50%;" src="{{URL::asset($category->path_of_image)}}"></td>
                        <td>
                            <form 
                                class="myform"  
                                id=""  
                                method="post"
                                action="{{ route('CategoryDelete', $category->id) }}"
                            >
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('CategoryEdit', $category->id) }}" class="btn btn-success a-btn-slide-text">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    <span><strong>Edit</strong></span>
                                </a> 
                                <button class="btn btn-danger a-btn-slide-text" style="float: none;">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    <span><strong>Delete</strong></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
            
        </table>
    </div>
</div>
@endsection