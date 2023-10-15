<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatUser;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    /**
     * @return View|
     */
    public function index(): View
    {
        $all_chats = Chat::with('chatUsers')->get();

        return view('chat.index', compact('all_chats'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request): RedirectResponse
    {
        $newChat = new Chat();
        $newChat->name = $request->get('chatName');
        $newChat->unique_name = Str::uuid()->toString();
        $newChat->save();

        return redirect()->route('chat.index');
    }

    /**
     * @param string $unique_name
     * @return View
     */
    public function chat(string $unique_name): View
    {
        $this_chat = Chat::with('chatUsers')->where('unique_name', $unique_name)->first();

        return view('chat.home', compact('this_chat'));
    }

    /**
     * @param string $unique_name
     * @return View
     */
    public function invite(string $unique_name): View
    {
        $chat = Chat::with('chatUsers')->where('unique_name', $unique_name)->first();

        return view('chat.invite', compact('chat'));
    }

    /**
     * @param Request $request
     * @param string $unique_name
     * @return RedirectResponse
     */
    public function join(Request $request, string $unique_name): RedirectResponse
    {
        $chat_to_join = Chat::where('unique_name', $unique_name)->first();

        $new_chat_user = new ChatUser;
        $new_chat_user->chat_id = $chat_to_join->id;
        $new_chat_user->name = $request->get('username');
        $new_chat_user->save();

        return redirect()->route('chat.view', ['unique_name' => $unique_name]);
    }
}
