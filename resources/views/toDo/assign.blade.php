<!DOCTYPE html>
<html lang="ja">

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
    <link rel="stylesheet" href="{{ asset('css/assign.css') }}">
</head>

<body>
    <x-header />
    <div class="layout">
        <x-sidebar />
        <main class="content">
            <x-projectbar />
            <div class="assign">
                <a class="assign_button">
                    <div>
                        アサイン作成
                    </div>
                </a>
                <div class="assign-main">
                    <div class="assign-content">
                        <div class="assign-content-block">
                            <p class="assign-content-title">アサイン名</p>
                            <p class="assign-content-p">テスト</p>
                        </div>
                        <div class="assign-content-block">
                            <p class="assign-content-title">内容</p>
                            <p class="assign-content-p">あああああああ</p>
                        </div>
                        <div class="assign-content-block">
                            <p class="assign-content-title">募集開始時刻</p>
                            <p class="assign-content-p">2000/01/01</p>
                        </div>
                        <div class="assign-content-block">
                            <p class="assign-content-title">募集終了時刻</p>
                            <p class="assign-content-p">2009/01/01</p>
                        </div>
                        <div class="assign-content-block">
                            <p class="assign-content-title">対象者</p>
                            <p class="assign-content-p">福田舵斗</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <x-task-create-modal :types="$types ?? 0" :milestones="$milestones ?? 0" :categories="$categories ?? 0" :statuses="$statuses ?? 0" :roles="$roles ?? 0"
        :rolelevels="$rolelevels ?? 0" :mode="$mode ?? 0" :users="$users ?? 0" />
    <script src="{{ asset('js/main2.js') }}"></script>
</body>

</html>

{{-- 初回コミット --}}
