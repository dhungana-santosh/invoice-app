<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends Factory<Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_number' =>fake()->dateTimeBetween('-1 month','now')
                    ->format('Y-m-d').'-'.
                    fake()->numberBetween(100000000000, 999999999999),
            'previous_amount'=> null,
            'received_amount' => null,
            'carried_over' => null,
            'purchased_amount' => null,
            'consumption_tax' => null,
            'total_purchase'=>null,
            'current_purchase_amount' => null,
            'regular_tax_amount' => null,
            'reduced_tax_amount' => null,
        ];
    }

    /**
     * @return InvoiceFactory
     */
    public function withDynamicDetails(): InvoiceFactory
    {
        $customerIds = Customer::pluck('id');

        return $this->state(new Sequence(
            fn (Sequence $sequence) => [
                'company_id' => Company::all()->random()->id,
                'customer_id' => $customerIds[$sequence->index % $customerIds->count()],
                'deadline' => now()->addYear()->format('Y-m-d'),
                'previous_amount' => fake()->numberBetween(5000, 10000),
                'received_amount' => function ($attributes) {
                    return $attributes['previous_amount'] - fake()->numberBetween(1000, 5000);
                },
                'carried_over' => function ($attributes) {
                    return $attributes['previous_amount'] - $attributes['received_amount'];
                },
            ],
        ));
    }
}
