<?php
/**
 * @var \App\Models\Chat $this_chat
 * @var \App\Models\ChatUser $chat_user
 * @var \App\Models\Message[] $messages
 */
?>

<x-layout>
    @section('scripts')
        <!-- Some JS and styles -->
    @endsection

    <div class="grid grid-cols-3 gap-4 px-12 py-12 h-96">
        <div class="col-span-3 justify-self-center">
            <h3 class="text-2xl">Welcome@ {{ $this_chat->name }}</h3>
            <p>Invite link:
            <code class="bg-gray-200 text-gray-800 px-2 py-1 rounded-md">
                    {{ route('chat.enter', ['unique_name' => $this_chat->unique_name]) }}
                </code>
            </p>
        </div>

        <div class="w-full border-solid border-2 border-lime-700 rounded-md bg-lime-200 h-full max-h-80 overflow-y-auto">
            <div class="text-center uppercase">
                users in chat
            </div>
            @foreach($this_chat->chatUsers AS $index => $chat_user)
                <div class="border-solid border-2  border-lime-700 rounded-md mx-11 my-2 text-center">
                    {{ $chat_user->name }}
                </div>
            @endforeach
        </div>

        <div class="border-solid border-2 border-lime-700 rounded-md bg-lime-100 col-span-2 px-8 py-3 h-full">
            @php $chat_field_height_classes = ($messages->count() >= 10) ? 'h-full max-h-80' : '' @endphp


            <div class="overflow-y-auto {{ $chat_field_height_classes }}">
                @foreach($messages AS $message)
                    @php $text_position = ($message->chat_user_id == $chat_user->id) ? 'text-right' : '' @endphp

                    <div class="border-solid border-2 border-lime-700 rounded-md my-2 {{ $text_position }}">
                        @if($message->chat_user_id != $chat_user->id)
                            <span class="text-end"><b>{{ $message->chatUser->name }}</b></span>
                        @endif

                        <span class="text-end px-10">{{ $message->message }}</span>
                    </div>
                @endforeach

            </div>

            <form action="{{ route('message.send', ['chat' => $this_chat->id, 'chatUser' => $chat_user->id]) }}" method="post"
                  class="">
                @csrf

                <div class="col-span-full mx-3 my-2">
                    <div class="mt-2">
                        <textarea name="message" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900
                            shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                            focus:ring-inset focus:ring-indigo-200 sm:text-sm sm:leading-6"></textarea>
                    </div>
                </div>

                <button class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1
                    ring-inset ring-gray-300 hover:bg-gray-50">
                    Send
                </button>

            </form>
        </div>
    </div>

</x-layout>
