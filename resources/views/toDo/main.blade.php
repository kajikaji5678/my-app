<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/main2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/projectbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/board.css') }}">
</head>

<body>
    <x-header />
    <div class="layout">
        <x-sidebar />
        <main class="content">
            <x-projectbar />
        </main>
    </div>
    <script src="{{ asset('js/main2.js') }}"></script>
</body>

</html>
