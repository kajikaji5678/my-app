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
  <link rel="stylesheet" href="{{ asset('css/board-box.css') }}">
  @viteReactRefresh
  @vite(['resources/css/app.css', 'resources/js/entries/entries.tsx'])
</head>

<body class="w-full h-full">
    <div id="app">
</body>

</html>

{{-- 初回 --}}
