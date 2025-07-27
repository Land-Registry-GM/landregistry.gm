<?php

namespace Database\Factories;

use App\Models\Owner;
use App\Models\Property;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'property_id' => Property::factory(),
            'buyer_id' => Owner::factory(),
            'seller_id' => Owner::factory(),
            'amount' => $this->faker->randomFloat(2, 1000, 1000000),
            'transaction_type' => $this->faker->randomElement(['sale', 'transfer', 'lease']),
            'transaction_date' => now(),
            'deed_number' => $this->faker->uuid,
            'tax_paid' => $this->faker->boolean,
            'recorded_by' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}