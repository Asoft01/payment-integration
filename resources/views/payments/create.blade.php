@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($category) ? 'Edit Payment' : 'Create Payment Method' }}
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <div class="list-group">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item text-danger">
                                {{ $error }}
                            </li>
                        @endforeach
                    </div>
                </div>
            @endif 

            <form action="{{ isset($payment_details) ? "/payments/update/".$payment_details->id : "/payments/store" }}" method="POST">
                @csrf
                @if(isset($payment_details))
                    @method('PUT')
                @endif 
                <div class="form-group">
                    <label for="name">
                        <input type="text" id="name" class="form-control" name="name" value="{{ isset($payment_details) ? $payment_details->name : '' }}">
                    </label>
                </div>
                <br>
                <div class="form-group offset">
                    <button class="btn btn-success">
                        {{ isset($payment_details) ? 'Update Payment Method' : 'Add Payment Method' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection