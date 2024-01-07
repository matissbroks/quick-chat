<?php
/**
 * @var \App\Models\Chat $chat
 */
?>

<x-layout>
    @section('scripts')
        <!-- Some JS and styles -->
    @endsection

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Log in into
                chat: {{ $entering_chat->name }}</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm border-double border-4 pl-3 pr-3 pb-3">
            <form action="{{ route('chat.enter', ['unique_name' => $entering_chat->unique_name]) }}" method="post"
                  class="space-y-6">
                @csrf

                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>

                    <div class="mt-2">
                        <input name="username" type="text" required
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>

                    <div class="mt-2">
                        <input name="password" type="password" required
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Enter
                    </button>
                </div>
            </form>


            <p class="mt-10 text-center text-sm text-gray-500">
                Or register <a href="{{ route('chat.invite', ['unique_name' => $entering_chat->unique_name]) }}">
                    <button type="button"
                            class="rounded-md bg-green-500 px-2.5 py-1.5 text-sm font-semibold text-green-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-green-400">
                        HERE
                    </button>
                </a>
            </p>
        </div>
    </div>

</x-layout>
