<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Fetch all categories
        return view('products.index', compact('categories'));
    }

    public function categories()
    {
        return response()->json(Category::all());
    }

    public function productsByCategory($categoryId)
    {
        return response()->json(Product::where('category_id', $categoryId)->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');
        $product = Product::create($request->only('name', 'description', 'price', 'category_id') + ['image' => $imagePath]);

        return response()->json(['message' => 'Product created', 'product' => $product]);
    }
}