@extends('master')

@section('content')
<div class="container">
    <h2>Product List</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>${{ $product->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
