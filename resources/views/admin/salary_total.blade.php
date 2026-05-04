<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="GET">
        <input type="number" name="year" value="{{ $year }}">
        <input type="number" name="month" value="{{ $month }}">
        <button type="submit">検索</button>
    </form>
    <p>{{ $total }}</p>
</body>
</html>