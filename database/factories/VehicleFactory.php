<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    protected $model = \App\Models\Vehicle::class;

    public function definition(): array
    {
        return [
            'id_vehicle' => $this->faker->uuid,
            'brand' => $this->faker->company,
            'model' => $this->faker->word,
            'color' => $this->faker->safeColorName,
            'nopol' => $this->faker->unique()->regexify('[A-Z]{2}[0-9]{4}[A-Z]{2}'),
            'is_available' => $this->faker->boolean(80),
        ];
    }
}
