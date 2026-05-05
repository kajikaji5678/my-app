<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>給与更新リスト</title>
</head>

<body>
    <h1>給与変更申請</h1>

    @foreach ($requests as $req)
    <p>user_id: {{ $req->user_id }}</p>
    <p>user name: {{ $req->user?->name }}</p>
    <p>現在給与: {{ $req->before_salary }}</p>
    <p>希望給与: {{ $req->after_salary }}</p>
    @endforeach

</body>

</html>