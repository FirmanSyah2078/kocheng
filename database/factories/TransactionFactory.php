<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'invoice_number' => 'INV-' . date('Ymd') . '-' . fake()->unique()->numberBetween(1000, 9999),
            'total_amount' => 0, 
            'payment_amount' => 0,
            'change_amount' => 0,
        ];
    }
}
