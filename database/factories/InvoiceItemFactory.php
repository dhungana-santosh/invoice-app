<?php

namespace Database\Factories;


use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;


/**
 * @extends Factory<InvoiceItem>
 */
class InvoiceItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_id' => Invoice::all()->random()->id,
            'voucher_date' => fake()->dateTimeBetween('-1 month','now')
                ->format('Y-m-d'),
            'voucher_no' => fake()->numberBetween(1,30),
            'item_code' => __('lang.test'),
            'item_name' => fake()->randomElement(__('product')),
            'quantity' => fake()->numberBetween(1,10),
            'unit' => fake()->randomElement(__('unit')),
            'unit_price' => fake()->numberBetween(1000,5000),
            'reduced_tax' => fake()->randomElement([true,false]),
        ];
    }

    /**
     * @return InvoiceItemFactory
     */
    public function withInvoice(): InvoiceItemFactory
    {
        return $this->state(new Sequence(
            fn (Sequence $sequence) => [
                'invoice_id' => Invoice::all()->random()->id,
                'quantity' => fake()->numberBetween(1,10),
                'purchase_price' => function ($attributes) {
                    return $attributes['quantity'] * $attributes['unit_price'];
                },
            ],
        ));
    }
}
