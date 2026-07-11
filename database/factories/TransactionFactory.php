<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;
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
        $status = fake()->randomElement(['pending', 'completed', 'cancelled']);

        return [
            'user_id' => User::factory(),
            'invoice_number' => 'INV-' . date('Ymd') . '-' . fake()->unique()->numberBetween(1000, 9999),
            'total_amount' => 0,
            'payment_amount' => 0,
            'change_amount' => 0,
            'status' => $status,
            // 'payment_method' => $status === 'completed' ? fake()->randomElement(['qris', 'ovo', 'dana', 'paypal', 'bayar ditempat']) : null,
            'payment_method' => fake()->randomElement(['qris', 'ovo', 'dana', 'paypal', 'bayar ditempat']),
        ];
    }
}
