<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'chat_id' => Chat::factory(),
            'chat_user_id' => ChatUser::factory(),
            'message' => fake()->text(100),
        ];
    }
}
