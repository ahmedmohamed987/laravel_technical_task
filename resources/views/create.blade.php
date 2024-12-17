@extends('master')
@section('content')
    <div class="container">
        <h2>Add New Product</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <div class="form-group w-50 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="exampleFormControlInput1" >
              </div>
          
            <div class="form-group w-50 ">
                <label for="price">Product Price</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <div class="form-group w-50">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Add Product</button>
        </form>
    </div>
@endsection