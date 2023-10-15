<?php
/**
 * @var \App\Models\Chat $chat
 */
?>

<x-layout>
    @section('scripts')
        <!-- Some JS and styles -->
    @endsection

    <h2>Join chat: {{ $chat->name }}</h2>

    <form action="{{ route('chat.join', ['unique_name' => $chat->unique_name]) }}" method="post">
        @csrf

        <label for="username">
            <input name="username" type="text">
        </label>

        <button type="submit">Join</button>
    </form>

</x-layout>
