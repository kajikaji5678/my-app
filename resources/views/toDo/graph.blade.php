<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>グラフ</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aside.css') }}">
    <link rel="stylesheet" href="{{ asset('css/board.css') }}">
    <link rel="stylesheet" href="{{ asset('css/projectbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/board-box.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-header />

    <div class="layout">
        <x-sidebar />
        <main class="content">
            <x-projectbar />
            <div class="flex p-6 gap-5">
                <div class="flex-1 bg-white rounded-md shadow p-6"></div>
                <div class="flex-1 bg-white rounded-md shadow p-6"></div>
                <div class="flex-1 bg-white rounded-md shadow p-6"></div>
                <div class="flex-1 bg-white rounded-md shadow p-6"></div>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/aside.js') }}"></script>
    <script src="{{ asset('js/main3.js') }}"></script>
</body>

</html>

{{-- 初回 --}}
