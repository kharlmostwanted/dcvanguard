<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => fake()->company(),
            'since' => fake()->dateTimeBetween('-5 years', 'now'),
            'representative_id' => User::factory(),
            'street' => fake()->streetAddress(),
            'city' => fake()->city(),
            'province' => fake()->state(),
        ];
    }
}
