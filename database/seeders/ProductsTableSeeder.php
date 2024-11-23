<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;
use App\Models\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();

        // $categories = Category::all();

        // foreach ($categories as $category) {
        //     for ($i = 0; $i < 10; $i++) {
        //         Product::create([
        //             'name' => $faker->word,
        //             'description' => $faker->sentence,
        //             'price' => $faker->randomFloat(2, 10, 500),
        //             'category_id' => $category->id,
        //         ]);
        //     }
        // }
        Product::factory(50)->create();
    }
}