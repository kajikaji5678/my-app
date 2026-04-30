<!DOCTYPE html>
<html lang="Ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>勤怠管理アプリ</title>
</head>

<body>
    <form action="main/post" method="POST">
        @csrf
        <button type="submit">出勤</button>
    </form>
    @if (session('message'))
        <p>{{ session('message') }}</p>        
    @endif
</body>

</html>
