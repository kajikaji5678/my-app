@props(['types', 'categories', 'statuses', 'roles', 'rolelevels', 'mode', 'users'])

<div id="modal" class="hidden fixed inset-0 justify-center items-center z-10
bg-gray-600 opacity-50">
    <div class="modal_content">
        <div id="modal_close" class="modal_close">
            <div class="modal_close_bar"></div>
            <div class="modal_close_bar2"></div>
        </div>
        <div class="modal_content_top">
            <p class="modal_text_top_1">タスク作成</p>
        </div>
        @if (isset($types) && !is_numeric($types))
            <x-modal-content-1 :types="$types ?? 0" :categories="$categories ?? 0" :statuses="$statuses ?? 0" />
            <x-modal-content-2 :types="$types ?? 0" :categories="$categories ?? 0" :statuses="$statuses ?? 0" />
            <x-modal-content-3 :types="$types ?? 0" :categories="$categories ?? 0" :statuses="$statuses ?? 0" />
        @endif
        @if (isset($roles) && !is_numeric($roles))
            <x-modal-content-4 :roles="$roles ?? 0" :rolelevels="$rolelevels ?? 0" />
        @endif
        @if (isset($users) && !is_numeric($users))
            <x-modal-content-5 :users="$users" />
        @endif
    </div>
</div>

{{--
* idは要素1つを特定するためのもの
* classは見た目や共通スタイルを当てはめるもの
* フォーム送信ならselectにnameメゾットが必要
* name = キー value = 値
--}}
