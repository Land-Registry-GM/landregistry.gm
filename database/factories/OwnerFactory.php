<?php

namespace Database\Factories;

use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;

class OwnerFactory extends Factory
{
    protected $model = Owner::class;

    public function definition()
    {
        return [
            'owner_name' => $this->faker->name,
            'owner_id_type' => 'passport',
            'owner_id_number' => $this->faker->uuid,
            'dob' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,
            'ethereum_address' => '0x' . bin2hex(random_bytes(20)),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}