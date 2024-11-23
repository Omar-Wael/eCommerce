<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word('ar_SA'), // Arabic word
            'description' => $this->faker->sentence(6, true, 'ar_SA'), // Arabic sentence
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            'pic' => $this->faker->imageUrl(640, 480, 'products', true, 'منتج'), // Fake product image
        ];
    }
}