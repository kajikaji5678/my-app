@props(['types', 'milestones', 'categories', 'statuses', 'users2'])
<div class="modal_content_bottom_1" id="modal_content_bottom_1">
    <form action="{{ route('board.add') }}" method="POST">
        @csrf
        {{-- どの列のボタンから作成されたタスクかを覚える入れ物 --}}
        <input type="hidden" id="status_id" name="status_id">

        <p class="modal_type">タスク名</p>
        <input type="text" name="task_name" placeholder="タスク名" class="modal_form">
        @error('task_name')
            <p class="error">{{ $message }}</p>
        @enderror

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
        <p class="modal_type">対象ユーザー</p>
        <select name="users_ids[]" multiple>
            @foreach ($users2 as $id => $name)
                <option value="{{ $id }}">
                    {{ $name }}
                </option>
            @endforeach
        </select>
        <button type="submit">送信</button>
    </form>
</div>
