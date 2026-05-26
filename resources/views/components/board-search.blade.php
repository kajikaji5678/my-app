@props(['types', 'milestones', 'categories'])

<form action="{{ route('board.form') }}" method="GET">
    <div class="condition">
        <p class="condition_name">タイプ</p>
        <select class="condition_box" name="aaa">
            @foreach ($types as $type)
                <option value="1">{{ $type->type_name }}</option>
            @endforeach
        </select>
    </div>
    <button>おして</button>
</form>
<form method="GET">
    <div class="condition">
        <p class="condition_name">カテゴリー</p>
        <select class="condition_box">
            @foreach ($categories as $category)
                <option>{{ $category->category_name }}</option>
            @endforeach
        </select>
    </div>
</form>
<form method="GET">
    <div class="condition">
        <p class="condition_name">マイルストーン</p>
        <select class="condition_box">
            @foreach ($milestones as $milestone)
                <option>{{ $milestone->milestone_name }}</option>
            @endforeach
        </select>
    </div>
</form>
