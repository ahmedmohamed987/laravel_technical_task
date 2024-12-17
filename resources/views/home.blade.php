    @extends('master')
    @section('content')
    @if (session('error'))
        <div class="alert alert-danger mt-2">
            {{ session('error') }}
        </div>
     @endif
         @if (session('success_message'))
         <div class="alert alert-success mt-2">{{ session('success_message') }}</div>
          @endif

     
    <div class="container">
        <h2>List of Products</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>${{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                            <a href="{{ route('products.edit',$item->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('products.delete',$item->id) }}" class="btn btn-danger">Delete</a>                            
                            <a href="{{ route('show',$item->id) }}" class="btn btn-secondary">BUY</a>                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        
    </div>
    <div class="add_btn">
        <a href="{{ route('product.create') }}" class="btn btn-primary">Add New Product</a>
    </div>
    <div class=" pag ">
        {{$product->links()}}
      </div>

@endsection



