<?php
/**
 * @var \App\Models\Chat $this_chat
 */
?>

<x-layout>
    @section('scripts')
        <!-- Some JS and styles -->
    @endsection

    <h3>{{ $this_chat->name }}</h3>
        <p>Invite link: <code>{{ route('chat.invite', ['unique_name' => $this_chat->unique_name]) }}</code></p>

    @foreach($this_chat->chatUsers AS $index => $chat_user)
            <?php /** @var \App\Models\ChatUser $chat_user */ ?>


        <div>
            ({{ $index + 1 }}) {{ $chat_user->name }}
        </div>
    @endforeach

</x-layout>
