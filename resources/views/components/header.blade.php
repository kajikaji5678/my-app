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
                    @if (isset($notifications)){{-- ifがないとnullの時に表示がバグる --}}
                        @foreach ($notifications as $notification)
                            <li class="notification-li">
                                <a href="{{ route('notification.open') }}">
                                    {{ $notification->data['message'] }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </li>
    </ul>
</header>
