@props(['types', 'milestones', 'categories'])

<div class="modal hidden" id="modal">
    <div class="overlay"></div>

    <div class="modal_content">
        <form action="{{ route('board.add') }}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="タスク名" class="task_name">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
            <p class="condition_name">カテゴリー</p>
            <select class="condition_box" name="type_id">
                <option value="">未選択</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ request('type_id') == $type->id ? 'selected' : '' }}>
                        {{ $type->type_name }}
                    </option>
                @endforeach
            </select>
            <p class="condition_name">マイルストーン</p>
            <select class="condition_box" name="milestone_id">
                <option value="">未選択</option>
                @foreach ($milestones as $milestone)
                    <option value="{{ $milestone->id }}"
                        {{ request('milestone_id') == $milestone->id ? 'selected' : '' }}>
                        {{ $milestone->milestone_name }}
                    </option>
                @endforeach
            </select>
            <p class="condition_name">カテゴリー</p>
            <select class="condition_box" name="category_id">
                <option value="">未選択</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            <button id="submit" type="submit">保存</button>
        </form>
    </div>
</div>
