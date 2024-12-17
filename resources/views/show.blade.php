@extends('master')

@section('content')
<div class="container">
<div class="container mt-4">
    <div class="card" style="width: 50%;">
        <div class="card-body">
            <h2 class="card-title">Product Details</h2>
            <div class="list-group">
                <div class="list-group-item">
                    <strong>Name:</strong> {{ $product->name }}
                </div>
                <div class="list-group-item">
                    <strong>Price:</strong> ${{ number_format($product->price, 2) }}
                </div>
                <div class="list-group-item">
                    <strong>Quantity:</strong> {{ $product->quantity }}
                </div>
            </div>
        </div>

    </div>
    <a href="{{ route('checkout',$product->id) }}" class="btn btn-primary m-3">CheckOut</a>
</div>
@endsection

