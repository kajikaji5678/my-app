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
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
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
                    <x-board-search :types="$types ?? 0" :milestones="$milestones ?? 0" :categories="$categories" />
                </div>
                <div class="dynamic">
                    @foreach ($statuses as $status)
                        <div class="dynamic_box">
                            <div class="dynamic_box_top">
                                <div class="dynamic_box_top1">
                                    <p class="dynamic_box_top_text1">
                                        {{ $status->status_name }}
                                    </p>
                                    <p class="dynamic_box_top_text2">
                                        {{ $tasks->where('status_id', $status->id)->count() }}
                                    </p>
                                </div>
                                {{-- todo ステータスidを持たせてモーダル作成 --}}
                                <div class="dynamic_box_top2" data-status-id="{{ $status->id }}">
                                    <img src={{ asset('img/plus16.png') }}>
                                </div>

                            </div>
                            <x-board-box-content :tasks="$tasks->where('status_id', $status->id)" :statuses="$statuses" />
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
    <x-task-create-modal :types="$types ?? 0" :milestones="$milestones ?? 0" :categories="$categories" />
    <script src="{{ asset('js/main2.js') }}"></script>
</body>

</html>
