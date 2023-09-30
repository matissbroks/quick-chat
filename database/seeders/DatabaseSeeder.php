<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Chat;
use App\Models\ChatUser;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         Chat::factory(3)->create();

         for ($i = 1; $i <= 10; $i++) {
             $id = rand(1, 3);
             $radn_usr_count = rand(1, 5);
             ChatUser::factory($radn_usr_count)->create([
                 'chat_id' => $id
             ]);
         }
    }
}
