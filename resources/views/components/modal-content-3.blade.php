@props(['types', 'milestones', 'categories', 'statuses'])
<div class="modal_content_bottom_3" id="modal_content_bottom_3">
    <form action="{{ route('assign.step1') }}" method="POST">
        @csrf
        <p class="modal_type">アサイン登録</p>
        <input type="text" name="assign_name" placeholder="タイトル" class="modal_form">
        @error('assign_name')
            <p class="error">{{ $message }}</p>
        @enderror

        <p class="modal_type">内容</p>
        <input type="text" name="assign_content" placeholder="内容" class="modal_form_2">
        @error('assign_content')
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
    </form>
</div>
