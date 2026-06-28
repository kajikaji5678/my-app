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
                <div class="flex-1 bg-white rounded-md shadow p-6">
                    <form method="GET" action="{{ route('graph.test') }}">
                        <label class="block text-sm text-slate-700 mb-2">担当者検索</label>
                        <input type="text" name="user_id" placeholder="ユーザー名を入力"
                            class="w-full border border-slate-300 rounded-md px-3 py-2">
                        <button type="submit" class="mt-3 text-sm text-blue-600">
                            検索
                        </button>
                    </form>
                    <div class="mt-4">
                        <p class="text-sm text-slate-500">予想時間</p>
                        <p class="text-2xl font-bold">{{ $estimated ?? '-' }}</p>
                    </div>
                    <div class="mt-3">
                        <p class="text-sm text-slate-500">実際時間</p>
                        <p class="text-2xl font-bold">{{ $real ?? '-' }}</p>
                    </div>
                </div>
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
