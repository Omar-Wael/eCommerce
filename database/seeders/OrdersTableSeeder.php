<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use Faker\Factory as Faker;
use App\Models\Product;
use App\Models\User;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $products = Product::all();

        foreach ($users as $user) {
            $order = Order::create([
                'user_id' => $user->id,
                'status' => 'completed',
                'total' => 0, // Will be calculated below
            ]);

            $orderTotal = 0;
            $orderProducts = $products->random(rand(1, 5))->mapWithKeys(function ($product) use (&$orderTotal) {
                $quantity = rand(1, 3);
                $orderTotal += $product->price * $quantity;

                return [
                    $product->id => ['quantity' => $quantity],
                ];
            });

            $order->products()->attach($orderProducts);
            $order->update(['total' => $orderTotal]);
        }
    }
}