@extends('layouts.sellermaster')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Products Table
        <a  href="{{ Route('SellerDashboard.create') }}" 
            class="btn btn-success a-btn-slide-text">
            <span><strong>Add Products</strong></span>
        </a>  
    </div>
    <div class="card-body table-responsive">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Starting Bid</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th>Edit/Delete</th>
                    <th>Approve/Reject</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Starting Bid</th>
                  <th>Duration</th>
                  <th>Status</th>
                  <th>Edit/Delete</th>
                  <th>Approve/Reject</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->start_price }}</td>
                        <td>{{ $product->duration }}</td>
                        <td>{{ $product->status }}</td>
                        <td>
                          <form 
                              class="myform"  
                              id=""  
                              method="post"
                              action=""
                          >
                              @csrf
                              @method('DELETE')
                              <a href="" class="btn btn-success a-btn-slide-text">
                                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                  <span><strong>Edit</strong></span>
                              </a>  
                              <button class="btn btn-danger a-btn-slide-text" style="float: none;">
                                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                  <span><strong>Delete</strong></span>
                              </button>
                          </form>
                      </td>
                        <td>
                          <form 
                              class="myform"  
                              id=""  
                              method="post"
                              action=""
                          >
                              @csrf
                              <a href="{{ route('ProductApprove', $product->id) }}" class="btn btn-success a-btn-slide-text">
                                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                  <span><strong>Approve</strong></span>
                              </a>
                              <a href="{{ route('ProductReject', $product->id) }}" class="btn btn-danger a-btn-slide-text">
                                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                  <span><strong>Reject</strong></span>
                              </a>
                          </form>
                        </td>
                    </tr>
                    
                
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>
@endsection