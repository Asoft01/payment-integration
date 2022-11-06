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

            <form action="/categories/store" method="POST">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif 
                <div class="form-group">
                    <label for="name">
                        <input type="text" id="name" class="form-control" name="name" value="{{ isset($category) ? $category->name : '' }}">
                    </label>
                </div>
                <br>
                <div class="form-group offset">
                    <button class="btn btn-success">
                        {{ isset($category) ? 'Update Category' : 'Add Category' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection