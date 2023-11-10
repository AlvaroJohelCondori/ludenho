<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $material_name = $this->faker->unique()->word(20);
        return [
            'material_name' => $material_name,
            'material_slug' => Str::slug($material_name),
            'material_description' => $this->faker->text(100),
            'material_color' => $this->faker->randomElement([
                'primary',
                'success',
                'danger',
                'warning',
                'info',
            ]),
        ];
    }
}
