<?php

namespace Database\Factories;

use App\Models\Notification;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    protected $model = Notification::class;

    public function definition(): array
    {
        return [
            'booking_id' => Booking::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'admin_id' => User::inRandomOrder()->where('level', 2)->first()->id, // Assuming admin users have a specific level
            'status' => $this->faker->randomElement(['new', 'apr', 'rej']),
            'message' => $this->faker->sentence,
            'is_read' => $this->faker->boolean(20), // 20% chance of being read
            'created_by' => $this->faker->name,
            'updated_by' => $this->faker->name,
        ];
    }
}
