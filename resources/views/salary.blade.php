<!DOCTYPE html>
<html lang="Ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>給与更新</title>
</head>
<body>
    <form action={{ url('/salary/update') }} method="POST">
        @csrf
        <input type="number" name="hourly_wage" value="{{ Auth::user()->hourly_wage }}">
        <button>更新</button>
    </form>
    @if (session('msg'))
        <p>{{ session('msg') }}</p>
    @endif
</body>
</html>