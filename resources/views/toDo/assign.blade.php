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
                <div class="condition_box">
                    <div class="condition_box_left">
                        <a href="" class="assign_button">
                            <div>
                                アサイン作成
                            </div>
                        </a>
                    </div>
                    <div class="condition_box_right">

                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
