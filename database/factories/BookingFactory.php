<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition(): array
    {
        return [
            'id_booking' => $this->faker->uuid,
            'id_vehicle' => Vehicle::inRandomOrder()->first()->id,
            'id_user' => User::inRandomOrder()->first()->id,
            'id_driver' => User::inRandomOrder()->first()->id,
            'driver_name' => $this->faker->name,
            'service' => $this->faker->randomElement(['internal', 'external']),
            'image' => $this->faker->imageUrl(),
            'from_address' => $this->faker->address,
            'from_lon' => $this->faker->longitude,
            'from_lat' => $this->faker->latitude,
            'to_address' => $this->faker->address,
            'to_lon' => $this->faker->longitude,
            'to_lat' => $this->faker->latitude,
            'status' => $this->faker->randomElement(['new', 'apr', 'rej']),
        ];
    }
}
