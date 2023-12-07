<x-layout>
    @section('scripts')
        <!-- Some JS and styles -->
    @endsection

    <form action="{{ route('chat.save') }}" method="post" class="max-w-sm mx-auto">
        @csrf

        <div class="mb-6">
            <label for="chatName" class="block mb-2 text-sm font-medium text-gray-900 text-center">Chat name</label>
            <input type="text" id="chatName"
                   class="bg-gray-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                   focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                   dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   required>
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-1/2">
                Save
            </button>
        </div>
    </form>

    <div class="max-w-sm mx-auto mt-4 border-double border-4 border-gray-500">

        <p class="text-center">Chats free to join</p>

        @foreach($all_chats AS $chat)
                <?php /** @var \App\Models\Chat $chat */ ?>

            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 mt-2" role="alert">
                <p class="font-bold">{{ $chat->name }}</p>
                <p class="text-sm">
                    <a href="{{ route('chat.enter', ['unique_name' => $chat->unique_name]) }}">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Join now
                        </button>
                    </a>
                </p>
            </div>
        @endforeach
    </div>
</x-layout>
