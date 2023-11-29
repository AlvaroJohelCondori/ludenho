<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spot>
 */
class SpotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $spot_title = $this->faker->unique()->word(20);

        return [
            'spot_title' => $spot_title,
            'spot_description' => $this->faker->text(150),
            'spot_color' => $this->faker->randomElement([
                'primary',
                'success',
                'danger',
                'warning',
                'info',
            ]),
        ];
    }
}
