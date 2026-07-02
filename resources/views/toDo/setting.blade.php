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
    <link rel="stylesheet" href="{{ asset('css/aside.css') }}">
    <link rel="stylesheet" href="{{ asset('css/board.css') }}">
    <link rel="stylesheet" href="{{ asset('css/settingbar.css') }}">
</head>

<body>
    <x-header :notifications="$notifications" />
    <div class="layout">
        <x-sidebar />
        <main class="content">
            <x-projectbar :project="$project" />
            <div class="setting">
                <div class="setting-bar">
                    <ul>
                        <li class="setting-bar-li">基本設定</li>
                        <li class="setting-bar-li">ユーザー設定</li>
                        <li class="setting-bar-li">その他</li>
                    </ul>
                </div>
                <div class="setting-content-2">
                    <p class="setting-title">ユーザー情報を変更する</p>
                    <p class="setting-sub-title">アイコン情報</p>
                    <div class="icon-box">
                        <img src={{ auth()->user()->icon_url }}>
                        <form action="{{ route('setting.icon') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="icon">
                            <button type="submit">アイコンを変更</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </main>
    </div>
    <script src="{{ asset('js/aside.js') }}"></script>
    <script src="{{ asset('js/main3.js') }}"></script>

</body>

</html>
