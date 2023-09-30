<?php

use App\Models\Chat;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $all_chats = Chat::with('chatUsers')->get();

    foreach ($all_chats AS $chat) {
        echo "<b>" . $chat->name . "</b>" . '<br>';
        foreach ($chat->chatUsers AS $chat_user) {
            echo "----->" . $chat_user->name . '<br>';
        }
    }
});
