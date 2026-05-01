<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>リスト仮</title>
</head>
<body>
    @foreach ($works as $work)
        <p>出勤: {{ $work->start_time }}</p>
        <p>退勤: {{ $work->end_time }}</p>
    @endforeach
</body>
</html>