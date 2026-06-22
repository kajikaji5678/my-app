@props(['types', 'milestones', 'categories'])
{{--
5/28 メモ
* value=送るデータそのもの
* action=送信先URL
* name = valueの同値
* selected = 初期値
--}}

<form action="{{ route('board.form') }}" method="GET" class="search_form">
    <div class="condition">
        <p class="condition_name">タイプ</p>
        <select class="condition_box" name="type_id">
            <option value="">未選択</option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}" {{ request('type_id') == $type->id ? 'selected' : '' }}>
                    {{ $type->type_name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="condition">
        <p class="condition_name">カテゴリー</p>
        <select class="condition_box" name="category_id">
            <option value="">未選択</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="condition">
        <p class="condition_name">マイルストーン</p>
        <select class="condition_box" name="milestone_id">
            <option value="">未選択</option>
            @foreach ($milestones as $milestone)
                <option value="{{ $milestone->id }}" {{ request('milestone_id') == $milestone->id ? 'selected' : '' }}>
                    {{ $milestone->milestone_name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="condition">
        <p class="condition_name">その他オプション</p>
        <label>
            <input type="checkbox" name="over-time"><span class="checkbox-span">工数超過のみ</span>
        </label>
    </div>
    <button type="submit">検索</button>
</form>
