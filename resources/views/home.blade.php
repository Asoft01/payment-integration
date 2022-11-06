@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome to Payment Integration Dashboard') }}</div>

              
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end my-2">
        <a href="categories/create" class="btn btn-success float-right">Add Payment Method</a>
     </div>
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
                        <tr>
                            <td>Adeleke Hammed</td>
                            <td>lekhad19@gmail.com</td>
                            <td>Edit | Delete</td>
                        </tr>
                    </tbody>
                </table>
              
                <!-- Modal -->
                
            </div>
        </div>
    </div>
</div>
@endsection
