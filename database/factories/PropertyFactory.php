<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    protected $model = Property::class;

    public function definition()
    {
        return [
            'parcel_id' => $this->faker->unique()->uuid,
            'street' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'postal_code' => $this->faker->postcode,
            'ownership_type' => $this->faker->randomElement(['freehold', 'leasehold']),
            'centroid_lat' => $this->faker->latitude,
            'centroid_lng' => $this->faker->longitude,
            'boundary_coordinates' => $this->generateBoundaryCoordinates(),
            'area' => $this->faker->randomFloat(2, 100, 10000),
            'land_use_type' => $this->faker->randomElement(['residential', 'commercial', 'agricultural', 'industrial']),
            'zoning' => strtoupper($this->faker->randomLetter) . $this->faker->randomNumber(2),
            'survey_plan_number' => 'SP-' . $this->faker->unique()->numberBetween(1000, 9999),
            'boundary_description' => $this->faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    private function generateBoundaryCoordinates(): array
    {
        $baseLat = $this->faker->latitude;
        $baseLng = $this->faker->longitude;
        
        return [
            ['lat' => $baseLat, 'lng' => $baseLng],
            ['lat' => $baseLat + 0.001, 'lng' => $baseLng],
            ['lat' => $baseLat + 0.001, 'lng' => $baseLng + 0.001],
            ['lat' => $baseLat, 'lng' => $baseLng + 0.001],
            ['lat' => $baseLat, 'lng' => $baseLng], // Close the polygon
        ];
    }
}