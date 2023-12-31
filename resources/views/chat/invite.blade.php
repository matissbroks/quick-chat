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
            Username
            <input name="username" type="text">
        </label>

        <label for="password">
            Password
            <input name="password" type="password">
        </label>

        <button type="submit">Join</button>
    </form>

</x-layout>
