<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\Message;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Chat::factory()
            ->count(2)
            ->has(
                ChatUser::factory()->count(3)
            )->create();

        $chatUser = ChatUser::factory()->create([
            'name' => 'Matiss',
            'chat_id' => 1,
        ]);

        Message::factory()
            ->count(3)
            ->create([
                'chat_user_id' => $chatUser->id,
                'chat_id' => 1,
            ]);
    }
}
