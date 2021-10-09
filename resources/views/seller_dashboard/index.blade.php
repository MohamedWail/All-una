@extends('layouts.sellermaster')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Products Table
        <a  href="" 
            class="btn btn-success a-btn-slide-text">
            <span><strong>Add Products</strong></span>
        </a>  
    </div>
    <div class="card-body table-responsive">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Starting Bid</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th>Edit/Delete</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Starting Bid</th>
                  <th>Duration</th>
                  <th>Status</th>
                  <th>Edit/Delete</th>
                </tr>
            </tfoot>
            <tbody>
              @foreach ($products as $product)
                <tr>{{ $product->name }}</tr>
                <tr>{{ $product->category->name }}</tr>
                <tr>{{ $product->description }}</tr>
                <tr>{{ $product->start_price }}</tr>
                <tr>{{ $product->duration }}</tr>
                <tr>{{ $product->status }}</tr>
                <tr>
                  <td>
                    <form 
                        class="myform"  
                        id=""  
                        method="post"
                        action=""
                    >
                        @csrf
                        @method('DELETE') 
                        <button class="btn btn-danger a-btn-slide-text" style="float: none;">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            <span><strong>Delete</strong></span>
                        </button>
                    </form>
                </td>
                </tr>
              @endforeach
            </tbody>
            
        </table>
    </div>
</div>
@endsection