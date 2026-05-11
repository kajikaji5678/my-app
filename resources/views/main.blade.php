<!DOCTYPE html>
<html lang="Ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>勤怠管理アプリ</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" </head>

<body>
    <div class="main">
        <div class="buttons_area">
            <div class="attendance_buttons {{ session('') }}">
                <form action={{ url('/main/post') }} method="POST">
                    @csrf
                    <button type="submit">出勤</button>
                </form>
            </div>
            <div class="attendance_buttons">
                <form action={{ url('/main/end') }} method="POST">
                    @csrf
                    <button type="submit">退勤</button>
                </form>
            </div>
        </div>
    </div>
    @if (session('message'))
    <p>{{ session('message') }}</p>
    @endif
    @if (session('error'))
    <p>{{ session('error') }}</p>
    @endif
    <a href={{ url('/salary') }}>給与更新リンク</a>
    <a href={{ url('/list') }}>給与確認リンク</a>
    <a href={{ url('/main/calendar') }}>カレンダーリンク</a>
</body>

</html>