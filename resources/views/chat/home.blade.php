<?php
/**
 * @var \App\Models\Chat $this_chat
 */
?>

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

<h3>{{ $this_chat->name }}</h3>

@foreach($this_chat->chatUsers AS $index => $chat_user)
    <?php /** @var \App\Models\ChatUser $chat_user */ ?>


    <div>
        ({{ $index + 1 }}) {{ $chat_user->name }}
    </div>
@endforeach

</body>
</html>
