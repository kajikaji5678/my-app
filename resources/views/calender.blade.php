<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>カレンダー</title>
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="calendar">
        @vite('resources/js/calendar.js')
    </div>
    dd(Auth::id());
</body>
</html>