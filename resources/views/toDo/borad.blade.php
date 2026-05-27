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
                    <x-board-search :types="$types" :milestones="$milestones" :categories="$categories"/>
                </div>
                <div class="dynamic">
                    <div class="dynamic_box">
                        <div class="dynamic_box_top">
                            <div class="dynamic_box_top1">
                                <p class="dynamic_box_top_text1">未対応</p>
                                <p class="dynamic_box_top_text2">{{ $toDoCount }}</p>
                            </div>
                            <div class="dynamic_box_top2">
                                <img src={{ asset('img/plus16.png') }}>
                            </div>
                        </div>
                        <x-board-box-content :tasks="$tasks->where('status', '未対応')" :types="$types"/>
                    </div>
                    <div class="dynamic_box">
                        <div class="dynamic_box_top">
                            <div class="dynamic_box_top1">
                                <p class="dynamic_box_top_text1">未対応</p>
                                <p class="dynamic_box_top_text2">{{ $doingCount }}</p>
                            </div>
                            <div class="dynamic_box_top2">
                                <img src={{ asset('img/plus16.png') }}>
                            </div>
                        </div>
                        <x-board-box-content :tasks="$tasks->where('status', '処理中')" />
                    </div>
                    <div class="dynamic_box">
                        <div class="dynamic_box_top">
                            <div class="dynamic_box_top1">
                                <p class="dynamic_box_top_text1">未対応</p>
                                <p class="dynamic_box_top_text2">{{ $doneCount }}</p>
                            </div>
                            <div class="dynamic_box_top2">
                                <img src={{ asset('img/plus16.png') }}>
                            </div>
                        </div>
                        <x-board-box-content :tasks="$tasks->where('status', '処理済み')" />
                    </div>
                    <div class="dynamic_box">
                        <div class="dynamic_box_top">
                            <div class="dynamic_box_top1">
                                <p class="dynamic_box_top_text1">未対応</p>
                                <p class="dynamic_box_top_text2">{{ $completeCount }}</p>
                            </div>
                            <div class="dynamic_box_top2">
                                <img src={{ asset('img/plus16.png') }}>
                            </div>
                        </div>
                        <x-board-box-content :tasks="$tasks->where('status', '完了')" />
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/main2.js') }}"></script>
</body>

</html>
