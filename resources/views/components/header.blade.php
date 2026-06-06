@props(['notifications']);

<header>
    <ul>
        <li>
            <a href="">ダッシュボード</a>
        </li>
        <li>
            <a href="">プロジェクト</a>
        </li>
        <li id="{{ isset($notifications) ? "notification" : "" }}" >
            <a href="">お知らせ</a>
        </li>
    </ul>
</header>
