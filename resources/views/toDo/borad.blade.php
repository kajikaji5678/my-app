<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aside.css') }}">
    <link rel="stylesheet" href="{{ asset('css/board.css') }}">
    <link rel="stylesheet" href="{{ asset('css/projectbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/board-box.css') }}">
</head>

<body>
    <x-header />

    <div class="layout">
        <x-sidebar />
        <main class="content">
            <x-projectbar />
            <div class="content_main">
                <p class="task_top_text">
                    課題
                <p>
                <div class="search">
                    <div class="condition">
                        <p class="condition_name">タイプ</p>
                        <select class="condition_box"></select>
                    </div>
                    <div class="condition">
                        <p class="condition_name">カテゴリー</p>
                        <select class="condition_box"></select>
                    </div>
                    <div class="condition">
                        <p class="condition_name">マイルストーン</p>
                        <select class="condition_box"></select>
                    </div>
                </div>
                <div class="dynamic">
                    <div class="dynamic_box">
                        <div class="dynamic_box_top">
                            <div class="dynamic_box_top1">
                                <p class="dynamic_box_top_text1">未対応</p>
                                <p class="dynamic_box_top_text2">5</p>
                            </div>
                            <div class="dynamic_box_top2">
                                <img src={{ asset('img/plus16.png') }}>
                            </div>
                        </div>
                        <x-board-box-content />
                    </div>
                    <div class="dynamic_box">
                        <div class="dynamic_box_top">
                            <div class="dynamic_box_top1">
                                <p class="dynamic_box_top_text1">未対応</p>
                                <p class="dynamic_box_top_text2">5</p>
                            </div>
                            <div class="dynamic_box_top2">
                                <img src={{ asset('img/plus16.png') }}>
                            </div>
                        </div>
                    </div>
                    <div class="dynamic_box">
                        <div class="dynamic_box_top">
                            <div class="dynamic_box_top1">
                                <p class="dynamic_box_top_text1">未対応</p>
                                <p class="dynamic_box_top_text2">5</p>
                            </div>
                            <div class="dynamic_box_top2">
                                <img src={{ asset('img/plus16.png') }}>
                            </div>
                        </div>
                    </div>
                    <div class="dynamic_box">
                        <div class="dynamic_box_top">
                            <div class="dynamic_box_top1">
                                <p class="dynamic_box_top_text1">未対応</p>
                                <p class="dynamic_box_top_text2">5</p>
                            </div>
                            <div class="dynamic_box_top2">
                                <img src={{ asset('img/plus16.png') }}>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/main2.js') }}"></script>
</body>

</html>
