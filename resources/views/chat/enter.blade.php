<?php
/**
 * @var \App\Models\Chat $chat
 */
?>

<x-layout>
    @section('scripts')
        <!-- Some JS and styles -->
    @endsection

    <h2>Log in into chat: {{ $entering_chat->name }}</h2>

    <p>Or register <a href="{{ route('chat.invite', ['unique_name' => $entering_chat->unique_name]) }}">HERE</a></p>

    <form action="{{ route('chat.enter', ['unique_name' => $entering_chat->unique_name]) }}" method="post">
        @csrf

        <label for="username">
            Username
            <input name="username" type="text">
        </label>

        <label for="password">
            Password
            <input name="password" type="password">
        </label>

        <button type="submit">Enter</button>
    </form>

</x-layout>
