<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('products', [ProductController::class, 'index']);
Route::get('categories', [ProductController::class, 'categories']);
Route::get('categories/{id}/products', [ProductController::class, 'productsByCategory']);
Route::post('products', [ProductController::class, 'store']);

Route::get('cart', [CartController::class, 'index']);
Route::post('cart', [CartController::class, 'addToCart']);
Route::delete('cart/{id}', [CartController::class, 'remove']);
Route::get('invoice/{id}', [OrderController::class, 'generateInvoice']);

Route::get('categories', [CategoryController::class, 'index']);

Route::get('orders', [OrderController::class, 'index']);

Route::get('checkout', [OrderController::class, 'checkout']);

    // Route::get('invoice/{id}', [OrderController::class, 'generateInvoice']);