<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('css/aside.css') }}">
  <link rel="stylesheet" href="{{ asset('css/board.css') }}">
  <link rel="stylesheet" href="{{ asset('css/projectbar.css') }}">
  @viteReactRefresh
  @vite(['resources/css/app.css', 'resources/js/entries/board.tsx'])
</head>

<body>
  <x-header />
  <div class="flex w-full h-full">
    <x-sidebar />
    <main class="h-[calc(100vh-50px)] flex flex-1 flex-col min-w-0 bg-[#F0F0F0]">

    </main>
  </div>
  <script src="{{ asset('js/aside.js') }}"></script>
</body>

</html>
