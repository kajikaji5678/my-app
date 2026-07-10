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
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/dashboard.js'])
</head>

<body>
    <x-header />

    <div class="flex w-full h-full">
        <x-sidebar />
        <main class="content">
            <x-projectbar :project="$data['project']" />

            <div class="flex p-6 gap-5 ">
                <div class="flex-1 bg-white rounded-md shadow p-6">
                    <form method="GET" action="{{ route('graph.test') }}">
                        <label class="block text-sm text-slate-700 mb-2">担当者検索</label>
                        <input type="text" name="user_id" placeholder="ユーザー名を入力"
                            class="w-full border border-slate-300 rounded-md px-3 py-2">
                        <button type="submit" class="">
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
                <div class="flex-1 bg-white rounded-md shadow p-6">
                    <h2 class="text-lg font-bold mb-4">見積もり超過率</h2>
                    <form method="GET" action="{{ route('graph.week') }}" class="mb-4">
                        <select name="period" class="w-full border border-slate-300 rounded-md px-3 py-2">
                            <option value="this_week">今週</option>
                            <option value="last_week">先週</option>
                            <option value="this_month">今月</option>
                        </select>
                        <button type="submit" 
                        class="mt-3 rounded-lg bg-blue-300 py-2 px-4 text-sm font-semibold text-white shadow-sm transition-all duration-200 
                        hover:bg-blue-500 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2">
                            検索
                        </button>
                    </form>
                    <div class="overflow-y-auto max-h-96">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-2 w-12">順位</th>
                                    <th class="text-left py-2">担当者</th>
                                    <th class="text-right py-2">超過率</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sortedRanking as $index => $user)
                                    <tr class="border-b border-slate-100">
                                        <td class="py-2">{{ $index + 1 }}</td>
                                        <td class="py-2">{{ $user['name'] }}</td>
                                        <td class="py-2 text-right">{{ $user['rate'] }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex-[2] bg-white rounded-md shadow p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-800">
                            工数管理
                        </h2>
                    </div>
                    <div class="w-1/2">
                        <canvas id="workTimeChart"></canvas>
                    </div>
                    <div class="w-1/2 h-1/2">
                        <canvas id="workTimeChart2"></canvas>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script src="{{ asset('js/aside.js') }}"></script>
    <script src="{{ asset('js/main3.js') }}"></script>

    <script>
        window.workTimeData = {
            estimated: {{ $planeEstimatedSum }},
            actual: {{ $planeRealSum }},
            add_estimated: {{ $planeAddEstimatedSum }}
        };
        window.workTimeData2 = {
            task1: {{ $timeByTask[1] }},
            task2: {{ $timeByTask[1] }},
            task3: {{ $timeByTask[2] }},
            task4: {{ $timeByTask[3] }},
            label1: "{{ $data['types']->pluck('type_name')[0] }}",
            label2: "{{ $data['types']->pluck('type_name')[1] }}",
            label3: "{{ $data['types']->pluck('type_name')[2] }}",
            label4: "{{ $data['types']->pluck('type_name')[3] }}",
        }
    </script>
</body>

</html>

{{-- 初回 --}}
