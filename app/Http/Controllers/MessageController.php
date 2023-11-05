<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function send(Chat $chat, ChatUser $chatUser, Request $request)
    {
        $newMessage = new Message();
        $newMessage->chat_id = $chat->id;
        $newMessage->chat_user_id = $chatUser->id;
        $newMessage->message = $request->get('message');
        $newMessage->save();
         return redirect()->route('chat.view', ['unique_name' => $chat->unique_name, 'username' => $chatUser->name]);
    }
}
