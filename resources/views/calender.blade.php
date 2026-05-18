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

    <div id="eventModal" class="modal hidden">
        <div class="modal-content">
            <h3>予定追加</h3>
            <input id="title" placeholder="予定">
            <input id="startTime" type="time">
            <input id="endTime" type="time">
            <div class="buttons">
                <button id="closeModal">キャンセル</button>
                <button id="saveEvent">保存</button>
            </div>
            <div class="close_button"><p>閉じる</p></div>
        </div>
    </div>
</body>

</html>
