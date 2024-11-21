<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        return response()->json(Cart::with('product')->get());
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::updateOrCreate(
            ['product_id' => $request->product_id],
            ['quantity' => DB::raw('quantity + ' . $request->quantity)]
        );

        return response()->json(['message' => 'Product added to cart', 'cart' => $cartItem]);
    }

    public function removeFromCart($id)
    {
        Cart::findOrFail($id)->delete();
        return response()->json(['message' => 'Product removed from cart']);
    }
}