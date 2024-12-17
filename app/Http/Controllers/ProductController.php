<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function get_data()
    {
       $product =Product::paginate(10);
        return view('home',compact('product'));
    }
    public function showProduct($id)
    {
       $product =Product::find($id);
        return view('show',compact('product'));
    }

    public function getProductsGreaterThan($amount)
    {
        $products = Product::where('price', '>', $amount)->get();

        return view ('getproduct',compact('products'));
    }
    public function create(){
       return view('create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);
         Product::create([
         "name"=>$request->name,
         "price"=>$request->price,
         "quantity"=>$request->quantity,

        ]);
        return redirect()->route('home');       
    }
     
    public function edit($id)
    {
        $product = Product::findOrFail($id);     
        return view('edit', compact('product'));     
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id);     
        $product->update($validated);     

        return redirect()->route('home')->with('success', 'Product updated successfully!'); 
    }
    public function delete($id){
        $products =Product::find($id);
        $products->delete();
        return redirect()->route('home');
    }
 

}
