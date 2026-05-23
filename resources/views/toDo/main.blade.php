<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/main2.css') }}">
</head>

<body>
    <header>
        <ul>
            <li>
                <a href="">ダッシュボード</a>
            </li>
            <li>
                <a href="">プロジェクト</a>
            </li>
            <li>
                <a href="">お知らせ</a>
            </li>
            <li>
                <a href="">メンバー招待</a>
            </li>
        </ul>
    </header>

    <main>
        <aside>
            <div class="aside_menu_bar_box">
                <div class="aside_menu_bar"></div>
            </div>
            <div class="aside_menu_box">
                <div class="aside_menu_img">
                    <img src="{{ asset('img/home.png') }}">
                </div>
                <a href="">ホーム</a>
            </div>
            <div class="aside_menu_box">
                <div class="aside_menu_img">
                    <img src="{{ asset('img/plus.png') }}">
                </div>
                <a href="">タスク追加</a>
            </div>
            <div class="aside_menu_box">
                <div class="aside_menu_img">
                    <img src="{{ asset('img/note.png') }}">
                </div>
                <a href="">ボード</a>
            </div>
            <div class="aside_menu_box">
                <div class="aside_menu_img">
                    <img src="{{ asset('img/setting.png') }}">
                </div>
                <a href="">設定</a>
            </div>
        </aside>
    </main>
    <script src="{{ asset('js/main2.js') }}"></script>
</body>

</html>
