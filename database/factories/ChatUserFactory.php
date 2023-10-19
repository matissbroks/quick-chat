<?php

namespace Database\Factories;

use App\Models\ChatUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ChatUser>
 */
class ChatUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'password' => '$2y$12$Z/vhVO3e.UXKaG11EWgxc.EL7uej3Pi1M0Pq0orF5cbFGtyVh0V3C', // password
        ];
    }
}
