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
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/assign.css') }}">
</head>

<body>
    <x-header />
    <div class="layout">
        <x-sidebar />
        <main class="content">
            <x-projectbar :project="$project"/>
            <div class="assign">
                <a class="assign_button">
                    <div>
                        アサイン作成
                    </div>
                </a>
                @if (isset($assigns))
                    <div class="assign-main">
                        <x-assign-content :assigns="$assigns" />
                    </div>
                @endif
            </div>
        </main>
    </div>
    <x-task-create-modal :types="$types ?? 0" :milestones="$milestones ?? 0" :categories="$categories ?? 0" :statuses="$statuses ?? 0" :roles="$roles ?? 0"
        :rolelevels="$rolelevels ?? 0" :mode="$mode ?? 0" :users="$users ?? 0" />
    <script src="{{ asset('js/aside.js') }}"></script>
    <script src="{{ asset('js/main3.js') }}"></script>
</body>

</html>

{{-- 初回コミット --}}
{{-- 初回コミット --}}
