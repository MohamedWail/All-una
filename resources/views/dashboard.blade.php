@extends('layouts.master')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Example
    </div>
    <div class="card-body table-responsive">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>ID</th>
                    <th>Approval</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>ID</th>
                    <th>Approval</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
            @foreach ($users as $user )
                <tbody>
                    <tr>
                        <td>{{ $user->first_name }} {{$user->last_name}}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ($user->type == 1) ? 'Buyer' : 'Seller' }}</td>
                        <td>{{ $user->status }}</td>
                        <td><img style="width: 100%;" src="{{URL::asset($user->path_of_id)}}"></td>
                        <td>
                            <form 
                                class="myform"  
                                id=""  
                                method="post"
                                action=""
                            >
                                @csrf
                                <a href="{{ route('approved', $user->id) }}" class="btn btn-success a-btn-slide-text">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    <span><strong>Approve</strong></span>
                                </a>
                                <a href="{{ route('rejected', $user->id) }}" class="btn btn-danger a-btn-slide-text">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    <span><strong>Reject</strong></span>
                                </a>
                            </form>
                        </td>
                        <td>
                            <form 
                                class="myform"  
                                id=""  
                                method="post"
                                action="{{(route('user.delete',$user->id))}}"
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
                </tbody>
            @endforeach
            
        </table>
    </div>
</div>
@endsection