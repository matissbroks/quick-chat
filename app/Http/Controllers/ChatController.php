<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function index()
    {
        $all_chats = Chat::with('chatUsers')->get();

        return view('chat.index', compact('all_chats'));
    }

    public function save(Request $request)
    {
        $newChat = new Chat();
        $newChat->name = $request->get('chatName');
        $newChat->unique_name = Str::uuid()->toString();
        $newChat->save();

        return redirect()->route('chat.index');
    }
}
