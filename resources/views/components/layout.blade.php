<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Quick chat</title>

        @yield('scripts')
        @vite('resources/css/app.css')
    </head>

    <body>
        <ul class="list-none">
            <li><a href="{{ route('chat.index') }}">HOME</a></li>
        </ul>

        {{ $slot }}
    </body>
</html>
