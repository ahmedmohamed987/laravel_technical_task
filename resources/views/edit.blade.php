@extends('master')
@section('content')
    <div class="container">
        <h2>Edit Product</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')  
            
            <div class="form-group w-50 mt-2">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>
            
            <div class="form-group w-50 mt-2">
                <label for="price">Product Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" required>
            </div>
            
            <div class="form-group w-50 mt-2">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Update Product</button>
        </form>
    </div>
@endsection