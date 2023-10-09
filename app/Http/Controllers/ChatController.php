<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View|
     */
    public function index()
    {
        $all_chats = Chat::with('chatUsers')->get();

        return view('chat.index', compact('all_chats'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $newChat = new Chat();
        $newChat->name = $request->get('chatName');
        $newChat->unique_name = Str::uuid()->toString();
        $newChat->save();

        return redirect()->route('chat.index');
    }

    /**
     * @param string $unique_name
     * @return \Illuminate\Contracts\View\View
     */
    public function chat(string $unique_name)
    {
        $this_chat = Chat::with('chatUsers')->where('unique_name', $unique_name)->first();

        return view('chat.home', compact('this_chat'));
    }
}
