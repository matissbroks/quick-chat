<x-layout>
    @section('scripts')
        <!-- Some JS and styles -->
    @endsection

    @foreach($all_chats AS $chat)
        <?php /** @var \App\Models\Chat $chat */ ?>

        <div>
            <a href="{{ route('chat.view', ['unique_name' => $chat->unique_name]) }}">{{ $chat->name }}</a>
        </div>
    @endforeach

    <br>

    <form action="{{ route('chat.save') }}" method="post">
        @csrf

        <label for="chatName">
            Chat name
            <input name="chatName" type="text">
        </label>

        <button type="submit">Save</button>
    </form>

</x-layout>
