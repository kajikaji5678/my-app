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
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/dashboard.js'])
</head>

<body>
    <x-header />

    <div class="flex w-full h-full">
        <x-sidebar />
        <main class="h-[calc(100vh-50px)] flex flex-1 flex-col min-w-0 bg-[#F0F0F0]">
            <x-projectbar :project="$project"/>
            <div class="py-6 px-8 flex flex-1 flex-col w-full overflow-hidden">
                <p class="text-lg font-bold">
                    課題
                <p>
                <div class="search">
                    <x-board-search :types="$types ?? 0" :categories="$categories" />
                </div>
                <div class="mt-4 flex-1 flex gap-4 flex-nowrap overflow-y-hidden w-full">
                    @foreach ($statuses as $status)
                        <div class="py-3 px-4 h-auto w-80 bg-white rounded-lg gap-3 overflow-y-auto">
                            <div class="flex items-center justify-between">
                                <div class="flex">
                                    <p class="text-[15px] font-bold flex items-center gap-2" style="--status-color: {{ $status->status_color }}">
                                        <span class="inline-block w-4 h-4 rounded-full" style="background-color: var(--status-color)"></span>
                                        {{ $status->status_name }}
                                    </p>
                                    <p class="bg-[#D9D9D9] py-1 px-4 rounded-2xl text-xs font-semibold ml-3">
                                        {{ $tasks->where('status_id', $status->id)->count() }}
                                    </p>
                                </div>
                                {{-- todo ステータスidを持たせてモーダル作成 --}}
                                <div class="mt-1 w-6 h-6 cursor-pointer" data-status-id="{{ $status->id }}">
                                    <img src={{ asset('img/plus16.png') }} class="scale-125">
                                </div>
                            </div>
                            {{-- ~ ここら辺ちょっとリファクタしたい気持ちがある --}}
                            <x-board-box-content
                            :normalTasks="$normalTasks->where('status_id', $status->id)"
                            :warningTasks="$warningTasks->where('status_id', $status->id)"
                            :superWarningTasks="$superWarningTasks->where('status_id', $status->id)"
                            :statuses="$statuses" :types="$types" />
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
    <x-task-create-modal :types="$types ?? 0" :categories="$categories" :statuses="$statuses" />
    <script src="{{ asset('js/aside.js') }}"></script>
    <script src="{{ asset('js/main3.js') }}"></script>
</body>

</html>

{{-- 初回 --}}
