<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product_name = $this->faker->unique()->sentence();

        return [
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'product_name' => $product_name,
            'product_slug' => Str::slug($product_name),
            'product_extract' => $this->faker->text(150),
            'product_body' => $this->faker->text(300),
            'product_status' => $this->faker->randomElement([1, 2]),
        ];
    }
}
