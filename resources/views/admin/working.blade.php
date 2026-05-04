<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>出勤中一覧</h1>
    @foreach ($workingUsers as $work)
        <div>
            {{ $work->user->name }} - {{ $work->star_time }}
        </div>
    @endforeach
</body>
</html>