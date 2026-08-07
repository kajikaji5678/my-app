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
  @viteReactRefresh
  @vite(['resources/css/app.css', 'resources/js/entries/board.tsx', 'resources/js/dashboard.js'])
</head>

<body>
  <x-header />
  <div class="flex w-full h-full">
    <x-sidebar />
    <main class="h-[calc(100vh-50px)] flex flex-1 flex-col min-w-0 bg-[#F0F0F0]">
      <x-projectbar :project="$project" />
      <div class="py-6 px-8 flex flex-1 flex-col w-full overflow-hidden">
        <p class="text-lg font-bold">課題
        <p>
        <div class="search">
          <x-board-search :types="$types ?? 0" :categories="$categories" />
        </div>
        <div class="mt-4 flex-1 flex gap-4 flex-nowrap overflow-y-hidden w-full">
          <div id="board" class="flex gap-4 w-full" data-tasks='@json($tasks)'
            data-statuses='@json($statuses)' data-categories='@json($categories)' data-edited-tasks='@json($editedTasks)'>
          </div>
        </div>
      </div>
    </main>
  </div>
  <x-task-create-modal :types="$types ?? 0" :categories="$categories" :statuses="$statuses" />
  <script src="{{ asset('js/aside.js') }}"></script>
</body>

</html>

{{-- 初回 --}}
