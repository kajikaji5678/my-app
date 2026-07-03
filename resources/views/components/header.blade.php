@props(['notifications'])
<header class="bg-[#edf4f0]">
    <ul class="flex gap-2">
        <li class="list-none px-3 py-2">
            <a href="" class="block px-4 py-2 text-[#333] hover:bg-[#acdac0] hover:text-[#bbffd9] transition duration-300">
                ダッシュボード
            </a>
        </li>
        <li class="list-none px-3 py-2">
            <a href="" class="block px-4 py-2 text-[#333] hover:bg-[#acdac0] hover:text-[#bbffd9] transition duration-300">
                プロジェクト
            </a>
        </li>
        <li id="{{ $notifications->isNotEmpty() ? 'notification' : '' }}" class="list-none px-3 py-2">
            <a href="" class="block px-4 py-2 text-[#333] hover:bg-[#acdac0] hover:text-[#bbffd9] transition duration-300">
                お知らせ
            </a>
            <div class="notification-modal">
                <ul>
                    @if ($notifications->isNotEmpty()){{-- ifがないとnullの時に表示がバグる --}}
                        @foreach ($notifications as $notification)
                            <li class="notification-li">
                                <a href="{{ route('notification.open', $notification->id) }}">
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
