<!DOCTYPE html>
<html lang="Ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>勤怠管理アプリ</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    <div class="main">
        <div class="top_area">
            <div class="notice_text">
                @if (session('absenceWarning'))
                    {{ $absenceWarning }}
                @endif
            </div>
        </div>
        <div class="bottom_area">
            <div class="bottom_area_1">
                <div class="buttons_area">
                    <div class="attendance_buttons {{ $working ? 'active' : '' }}">
                        <form action={{ url('/main/post') }} method="POST">
                            @csrf
                            <button type="submit">
                                {{ $working ? '出勤中' : '出勤' }}
                            </button>
                        </form>
                    </div>
                    <div class="attendance_buttons">
                        <form action={{ url('/main/end') }} method="POST">
                            @csrf
                            <button type="submit">退勤</button>
                        </form>
                    </div>
                </div>

                <div class="time_area">
                    <div class="clock">
                        <p class="clock_top_text">現在の時刻は</p>
                        <p>
                            <span id="show_hour"></span>時
                            <span id="show_min"></span>分
                            <span id="show_sec"></span>秒
                        </p>
                    </div>
                </div>
            </div>

            <div class="bottom_area_3">
                <div class="border_top"></div>
                <p>こんにちは、{{ $name }}さん</p>
                <p>タスク管理</p>
                <div>
                    @for ($i = 0; $i < count($array); $i++)
                        @if ($i % 2 == 0)
                            <p class="task_list_left">
                                {{ $array[$i] }}
                            </p>
                        @else
                            <p class="task_list_right">
                                {{ $array[$i] }}
                            </p>
                        @endif
                    @endfor
                </div>
                <div class="toDoList">
                    <div class="right_infinite"></div>
                </div>
            </div>

        </div>
    </div>
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
    <a href={{ url('/list') }}>給与確認リンク</a>
    <a href={{ url('/main/calendar') }}>カレンダーリンク</a>
    <a href={{ url('/salary') }}>給与更新リンク</a>
    @vite('resources/js/main.js')


</body>

</html>
