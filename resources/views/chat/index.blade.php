<x-layout>
    @section('scripts')
        <!-- Some JS and styles -->
    @endsection

    @foreach($all_chats AS $chat)
        <?php /** @var \App\Models\Chat $chat */ ?>

        <div>
            <a href="{{ route('chat.enter', ['unique_name' => $chat->unique_name]) }}">{{ $chat->name }}</a>
        </div>
    @endforeach

    <br>

    <form action="{{ route('chat.save') }}" method="post" class="max-w-sm mx-auto">
        @csrf

        <div class="mb-6">
            <label for="chatName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chat name</label>
            <input type="text" id="chatName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>

{{--        <label for="chatName">--}}
{{--            Chat name--}}
{{--            <input name="chatName" type="text">--}}
{{--        </label>--}}

        <button type="submit">Save</button>
    </form>
</x-layout>
