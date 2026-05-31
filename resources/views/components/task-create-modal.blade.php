@props(['types', 'milestones', 'categories'])

<div id="taskModal" class="modal">
    <div class="modal_content">
        <div id="modal_close" class="modal_close">
            <div class="modal_close_bar"></div>
            <div class="modal_close_bar2"></div>
        </div>
        <div class="modal_content_top"></div>
        <div class="modal_content_bottom">
            <form action="{{ route('board.add') }}" method="POST">
                @csrf
                {{-- どの列のボタンから作成されたタスクかを覚える入れ物 --}}
                <input type="hidden" id="status_id" name="status_id">

                <p class="modal_type">タスク名</p>
                <input type="text" name="task_name" placeholder="タスク名" class="modal_form">

                <p class="modal_type">タイプ</p>
                <select name="type_id" class="modal_form">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">
                            {{ $type->type_name }}
                        </option>
                    @endforeach
                </select>
                <p class="modal_type">カテゴリー</p>
                <select name="category_id" class="modal_form">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
                <p class="modal_type">マイルストーン</p>
                <select name="milestone_id" class="modal_form">
                    @foreach ($milestones as $milestone)
                        <option value="{{ $milestone->id }}">
                            {{ $milestone->milestone_name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit">送信</button>
            </form>
        </div>
    </div>
</div>

{{-- 
* idは要素1つを特定するためのもの
* classは見た目や共通スタイルを当てはめるもの
* フォーム送信ならselectにnameメゾットが必要
* name = キー value = 値
--}}
