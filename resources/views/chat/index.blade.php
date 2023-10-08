<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@foreach($all_chats AS $chat)
    <div>
        {{ $chat->name }}
    </div>
    @foreach($chat->chatUsers AS $chat_user)
        <div>
            -----> {{ $chat_user->name }}
        </div>
    @endforeach
@endforeach

<br>

<form action="{{ route('chat.save') }}" method="post">
    @csrf

    <label for="chatName"></label>
    <input name="chatName" type="text">

    <button type="submit">Save</button>
</form>

</body>
</html>
