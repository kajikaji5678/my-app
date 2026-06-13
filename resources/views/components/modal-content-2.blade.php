@props(['types', 'milestones', 'categories', 'statuses'])
<div class="modal_content_bottom_2" id="modal_content_bottom_2">
    <div class="modal-form">
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
    </div>
    <div class="modal-comment">
        <p class="comment-title">コメント一覧</p>
        <div class="comment-box">
            <div class="comment-box-img">
                <img src="{{ auth()->user()->icon_url }}">
            </div>
            <div class="comment-content">
            </div>
        </div>
        <form method="POST" class="comment-out">
            @csrf
            <input type="hidden" name="commentable_type" id="commentable_type">
            <input type="hidden" name="commentable_id" id="commentable_id">
            <textarea name="body" class="textarea" required></textarea>
            <button type="submit" class="comment-button">コメントを送信</button>
        </form>
    </div>
</div>
