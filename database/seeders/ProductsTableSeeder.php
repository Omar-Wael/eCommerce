<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            Product::create([
                'name' => $faker->word, // Random product name
                'description' => $faker->sentence, // Random description
                'price' => $faker->randomFloat(2, 10, 1000), // Random price between 10 and 1000
                'image' => $faker->imageUrl(640, 480, 'products', true), // Random product image URL
                'category_id' => rand(1, 5), // Assuming categories have IDs 1-5
            ]);
        }
    }
}
