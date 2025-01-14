<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstName = fake()->firstName();
        $lastName = fake()->lastName();
        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'name' => "{$lastName} {$firstName}",
            'birth_date' => fake()->date(),
            'hired_at' => fake()->dateTime(),
            'started_at' => fake()->dateTime(),
        ];
    }
}
