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
        @php
            $start = \Carbon\Carbon::parse($work->start_time);
        @endphp

        <p>{{ $start->format('Y年') }}</p>
    @endforeach

    <p>{{ $start->format('Y年') }}</p>
</body>
</html>