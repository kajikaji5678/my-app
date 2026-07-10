@props(['types', 'milestones', 'categories', 'statuses'])
<div class="flex w-full justify-center p-6" id="modal_content_bottom_1">
    <form action="{{ route('board.add') }}" method="POST" class="w-1/3">
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
        <div class="mt-4 w-1/2">
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
            </select>
        </div>
        <div class="mt-4 w-1/2">
            <label class="mb-2 block text font-semibold text-gray-700">
                カテゴリーを選択
            </label>
            <select name="category_id"
                class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm
            transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <label class="mb-2 block text font-semibold text-gray-700">
                タスクの内容を説明
            </label>
            <button type="button" id="bold"
                class="rounded px-3 py-1 text-sm bg-gray-200 hover:bg-gray-400">B</button>
            <button type="button" id="Itaric"
                class="rounded px-3 py-1 text-sm bg-gray-200 hover:bg-gray-400">I</button>
            <div
                class="rounded-lg border border-gray-300 transition
            focus-within:border-blue-500
            focus-within:ring-2
            focus-within:ring-blue-200">
                <div id="editor"></div>
            </div>
            <input type="hidden" name="description" id="description">
        </div>
        <button type="submit"
            class="mt-6 rounded-lg bg-blue-500 py-2 px-4
            text font-semibold text-white shadow-sm tracking-wide
            transition-all duration-200
            hover:bg-blue-700 hover:shadow-md
            focus:outline-none focus:ring-2 focus:ring-blue-900 focus:ring-offset-2">
            タスクを作成 </button>
    </form>
</div>
