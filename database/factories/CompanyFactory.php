<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class CompanyFactory extends Factory
{
    protected $model = Company::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company,
            'postal_code' => fake()->postcode,
            'address' => fake()->address(),
            'phone_number' => fake()->phoneNumber,
            'bank_name' => __('lang.bank_name'),
            'bank_account_number' => fake()->numberBetween(100000000000, 999999999999),
            'registration_number' => fake()->numberBetween(10000000000, 99999999999)
        ];
    }
}
