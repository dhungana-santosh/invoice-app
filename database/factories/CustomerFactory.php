<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => strtoupper(fake()->randomLetter()) . fake()->randomNumber(9),
            'name' => fake()->company(),
            'address' => fake()->address(),
            'postal_code' => fake()->postcode,
            'phone_number' => fake()->phoneNumber,
        ];
    }
}
