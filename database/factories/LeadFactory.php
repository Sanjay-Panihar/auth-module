<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomNumber(),
            'created_at' => $this->faker->dateTime(),
            'query' => $this->faker->sentence(),
            'type' => $this->faker->randomElement(['WEB', 'MOBILE', 'AUTO', 'EMBEDDED']),
            'status' => $this->faker->randomElement(['ACTIVE', 'INACTIVE']),
        ];
    }
}
