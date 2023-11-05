<?php
/**
 * @var \App\Models\Chat $this_chat
 * @var \App\Models\ChatUser $chat_user
 * @var \App\Models\Message[] $messages
 */
?>

<x-layout>
    <style>
        .align-center {
            width: 60%;
            margin: 0 auto;
        }

        #chat_field {
            padding: 0.5rem 1.25rem 0 1.25rem;
            width: 60%;
            min-height: 250px;
            border: 1px solid red;
            margin: 0 auto;
        }

        .message_row {
            width: 100%;
            height: 20px;
            border: 1px solid green;
            margin-bottom: 0.25rem;
        }

        #send_message {
            margin-top: 1rem;
        }
    </style>

    @section('scripts')
        <!-- Some JS and styles -->
    @endsection

    <h3>{{ $this_chat->name }}</h3>
    <p>Invite link: <code>{{ route('chat.enter', ['unique_name' => $this_chat->unique_name]) }}</code></p>

    <p>Welcome: {{ $chat_user->name }}</p>

    @foreach($this_chat->chatUsers AS $index => $chat_user)
            <?php /** @var \App\Models\ChatUser $chat_user */ ?>

        <div>
            ({{ $index + 1 }}) {{ $chat_user->name }}
        </div>
    @endforeach

    <div id="chat_field">
        @foreach($messages AS $message)
            <div class="message_row">
                <span class="message_from"><b>{{ $message->chatUser->name }}</b></span>
                <span class="message">{{ $message->message }}</span>
            </div>
        @endforeach

    </div>

    <form action="{{ route('message.send', ['chat' => $this_chat->id, 'chatUser' => $chat_user->id]) }}" method="post"
          class="align-center" id="send_message">
        @csrf

        <label for="message">
            <input type="text" name="message" id="message" placeholder="Type your message here">
        </label>

        <button>Send</button>
    </form>

</x-layout>
