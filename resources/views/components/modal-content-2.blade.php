@props(['types', 'milestones', 'categories', 'statuses'])
<div class="modal_content_bottom_2" id="modal_content_bottom_2">
    <form action="{{ route('board.status') }}" method="POST">
        @csrf
        <input type="hidden" id="task_id" name="task_id">
        <p class="modal_type">ステータス更新</p>
        <select name="status_id" class="modal_form">
            @foreach ($statuses as $status)
                <option value="{{ $status->id }}">
                    {{ $status->status_name }}
                </option>
            @endforeach
        </select>
        <button type="submit">送信</button>
    </form>
    <div class="modal-comment">

    </div>
</div>
