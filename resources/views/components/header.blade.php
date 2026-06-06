@props(['notifications'])
<header>
    <ul>
        <li>
            <a href="">ダッシュボード</a>
        </li>
        <li>
            <a href="">プロジェクト</a>
        </li>
        <li id="{{ isset($notifications) ? 'notification' : '' }}">
            <a href="">お知らせ</a>
            <div class="notification-modal">
                <ul>
                    <li class="notification-li">
                        という件名にてアサインされています！
                    </li>
                    <li class="notification-li">
                        という件名にてアサインされています！
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</header>
