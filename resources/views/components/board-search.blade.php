@props(['types', 'milestones', 'categories'])
{{-- 
5/28 メモ
* value=送るデータそのもの
* action=送信先URL
* name = valueの同値
--}}

<form action="{{ route('board.form') }}" method="GET" class="search_form">
    <div class="condition">
        <p class="condition_name">タイプ</p>
        <select class="condition_box" name="type_id">
            @foreach ($types as $type)
                <option value="{{ $type->id }}">
                    {{ $type->type_name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="condition">
        <p class="condition_name">カテゴリー</p>
        <select class="condition_box" name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="condition">
        <p class="condition_name">マイルストーン</p>
        <select class="condition_box" name="type_id">
            @foreach ($milestones as $milestone)
                <option value="{{ $milestone->id }}">
                    {{ $milestone->milestone_name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit">検索</button>
</form>
