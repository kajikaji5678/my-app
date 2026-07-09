@props(['types', 'milestones', 'categories', 'statuses'])
<div class="flex w-full justify-center p-6" id="modal_content_bottom_1">
    <form action="{{ route('board.add') }}" method="POST">
        @csrf
        {{-- どの列のボタンから作成されたタスクかを覚える入れ物 --}}
        <div>
            <label class="mb-2 block text font-semibold text-gray-700">
                タスク名
            </label>
            <input type="text" name="task_name" placeholder="タスク名を入力"
                class="w-full rounded-lg border border-gray-300 px-4 py-2
            text-sm shadow-sm transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
            @error('task_name')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label class="mb-2 block text font-semibold text-gray-700">
                タイプを選択
            </label>
            <select name="type_id"
            class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm
            transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
            @foreach ($types as $type)
                <option value="{{ $type->id }}">
                    {{ $type->type_name }}
                </option>
            @endforeach
        </div>
        <p class="modal_type">カテゴリー</p>
        <select name="category_id" class="modal_form">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
        <button type="submit">送信</button>
    </form>
</div>
