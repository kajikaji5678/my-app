<aside class="sidebar">
    <div class="aside_menu_bar_box">
        <div class="aside_menu_bar"></div>
    </div>
    <div class="aside_menu_box">
        <div class="aside_menu_img">
            <img src="{{ asset('img/home.png') }}">
        </div>
        <a href="{{ url('toDo/main') }}">ホーム</a>
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
        <a href={{ url('/toDo/board') }}>ボード</a>
    </div>
    <div class="aside_menu_box">
        <div class="aside_menu_img">
            <img src="{{ asset('img/setting.png') }}">
        </div>
        <a href="{{ url('toDo/setting') }}">設定</a>
    </div>
    <div class="aside_menu_box">
        <div class="aside_menu_img">
            <img src="{{ asset('img/address.png') }}">
        </div>
        <a href="{{ url('/toDo/assign') }}">アサイン</a>
    </div>
    <div class="aside_menu_box">
        <div class="aside_menu_img">
            <img src="{{ asset('img/admin.png') }}">
        </div>
        <a href="{{ url('/toDo/assign') }}">管理者</a>
    </div>
</aside>
