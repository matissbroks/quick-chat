<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\Message;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
    public function chat(string $unique_name, string $username): View
    {
        $this_chat = Chat::with('chatUsers')->where('unique_name', $unique_name)->first();

        $chat_user = ChatUser::whereName($username)->first();

        $messages = Message::with('chatUser')->where('chat_id', $this_chat->id)->get();

        return view('chat.home', compact('this_chat', 'chat_user', 'messages'));
    }

    public function enter(Request $request, string $unique_name)
    {
        $entering_chat = Chat::where('unique_name', $unique_name)->first();

        if ($request->isMethod('post')) {

            /** @var ChatUser $chat_user */
            $chat_user = ChatUser::whereName($request->post('username'))->first();

            if(!$chat_user) {
                return redirect()->route('chat.enter', ['unique_name' => $unique_name]);
            }

            if (Hash::check($request->post('password'), $chat_user->password)) {
                return redirect()->route('chat.view', ['unique_name' => $unique_name, 'username' => $chat_user->name]);
            }

            return redirect()->route('chat.enter', ['unique_name' => $unique_name]);
        }

        return view('chat.enter', compact('entering_chat'));
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
        $new_chat_user->password = Hash::make($request->post('password'));
        $new_chat_user->save();

        return redirect()->route('chat.enter', ['unique_name' => $unique_name]);
    }
}
