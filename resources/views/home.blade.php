@extends('layouts.app')

@section('content')
<div class="container">
     <div class="d-flex justify-content-end my-2">
        <a href="payments/create" class="btn btn-success float-right">Add Payment Method</a>
     </div>
     <h1 class="text-center">Payment Methods</h1>
    <div class="card card-default">
        <div class="card-header">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $payment->name }}</td>
                                <td>
                                    @if ($payment->status == 1)
                                        <span class="badge badge-success" style="color: green">Active</span>
                                        @else
                                        <span class="badge badge-success" style="color: red">Inactive</span>
                                    @endif
                                </td>
                                <td> <a class="btn btn-primary btn-sm"  href="/payments/edit/{{ $payment->id }}">Edit</a> | <a class="btn btn-danger btn-sm">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              
                <!-- Modal -->
                
            </div>
        </div>
    </div>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <h1 class="text-center">Registered Users</h1>

    <div class="card card-default">
        <div class="card-header">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><a class="btn btn-primary btn-sm">Edit</a>  | <a class="btn btn-danger btn-sm">Delete</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              
                <!-- Modal -->
                
            </div>
        </div>
    </div>
</div>
@endsection
