<!DOCTYPE html>
<html lang="Ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>勤怠管理アプリ</title>
</head>

<body>
    @if (session('start_time'))
        <p id="timer"></p>
        <script>
            const startTime = new Date("{{ session('start_time') }}");
            const timer = setInterval(() => {
                const now = new Date();
                const diff = Math.floor((now - startTime) / 1000);
                const hours = String(Math.floor(diff / 3600)).padStart(2, '0');
                const minutes = String(Math.floor((diff % 3600) / 60)).padStart(2, '0');
                const seconds = String(diff % 60).padStart(2, '0');
                document.getElementById('timer').textContent = `${hours}:${minutes}:${seconds}`
            }, 1000);
        </script>
    @endif

    <form action={{ url('/main/post') }} method="POST">
        @csrf
        <button type="submit">出勤</button>
    </form>
    <form action={{ url('/main/end') }} method="POST">
        @csrf
        <button type="submit">退勤</button>
    </form>
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
    <a href={{ url('/salary') }}>給与更新リンク</a>
    <a href={{ url('/list') }}>給与確認リンク</a>
</body>

</html>
