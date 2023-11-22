<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Start>
 */
class StartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_title = $this->faker->unique()->word(20);

        return [
            'start_title' => $start_title,
            'start_subtitle' => $this->faker->word(30),
            'start_state' => $this->faker->randomElement([1, 2]),
        ];
    }
}
