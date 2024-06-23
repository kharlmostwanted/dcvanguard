<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Billing>
 */
class BillingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $due = fake()->dateTimeBetween('-1 year', '+1 month');
        return [
            'client_id' => Client::factory(),
            'total_price' => fake()->randomFloat(2, 100, 1000),
            'number' => fake()->word() . fake()->randomNumber(3),
            'due_at' => $due,
            'number_of_guards' => fake()->randomNumber(2),
            'start_date' => Carbon::parse($due)->copy()->sub('15 days'),
            'end_date' => $due,
        ];
    }
}
