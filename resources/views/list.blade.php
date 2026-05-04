<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>リスト仮</title>
</head>

<body>
    <form action={{ url('/list/narrow') }} method="POST">
        @csrf
        <input type="number" name="year" value="2026">
        <input type="number" name="month" value="4">
        <button>検索</button>
    </form>
    <h1>{{ $year ?? now()->year}}年{{ $month ?? now()->month}}月</h1>

    @if(isset($works))
        @foreach ($works as $work)
            <p>{{ $work->start_time }}</p>
            <p>{{ $work->end_time }}</p>
            <p>合計金額: {{ $work->salary_sum }}</p>
        @endforeach
        <p>月の合計金額: {{ $total }}</p>
    @endif
</body>

</html>