<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ApiProductController;



Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/products', [ApiProductController::class, 'index']);
    Route::get('/showproducts/{id}', [ApiProductController::class, 'show']);
    Route::post('/create/product', [ProductController::class, 'store']);
    Route::delete('products/{id}', [ApiProductController::class, 'destroy']); 
    Route::put('products/{id}', [ApiProductController::class, 'update']); 

});
