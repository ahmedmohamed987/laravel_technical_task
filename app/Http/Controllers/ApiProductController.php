<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ApiProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json($products);
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
    ]);

    $product = Product::create([
        "name"=>$request->name,
        "price"=>$request->price,
        "quantity"=>$request->quantity,
    ]);

    return response()->json($product);
}


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product); 
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);
    
        $product = Product::findOrFail($id);
    
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
    
        return response()->json($product);
    }
    public function destroy($id)
{
    $product = Product::findOrFail($id); 

    $product->delete(); 

    return response()->json( "deleted Successfully"); 
}



}
