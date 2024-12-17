<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\VerifyRequestSource;
use App\Http\Controllers\StripeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('show/{id}',[ProductController::class,'showProduct'])->middleware(VerifyRequestSource::class)->name('show');
Route::get('home',[ProductController::class,'get_data'])->name("home");
Route::get('checkout/{id}',[ProductController::class,'Check'])->name("Check");
Route::post('product', [ProductController::class, 'store'])->name('product.store');
Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/products/greater-than/{amount}', [ProductController::class, 'getProductsGreaterThan']);
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit'); 
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update'); 
Route::get('/products/delete/{product}', [ProductController::class, 'delete'])->name('products.delete'); 


Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::post('/payment', [StripeController::class, 'processPayment'])->name('payment.process');
