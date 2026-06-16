@props(['types', 'milestones', 'categories', 'statuses'])
<div class="modal_content_bottom_2" id="modal_content_bottom_2">
    <div class="modal-left">
        <div class="modal-info">
            <p class="modal-info-title">タスク名</p>
            <p id="task_name" class="modal-info-name-large"></p>
        </div>
        <div class="modal-info">
            <p class="modal-info-p">カテゴリー</p>
            <p id="category_name" class="modal-info-name"></p>
        </div>
        <div class="modal-info">
            <p class="modal-info-p">タイプ</p>
            <p id="type_name" class="modal-info-name"></p>
        </div>
        <div class="modal-info">
            <p class="modal-info-p">マイルストーン</p>
            <p id="milestone_name" class="modal-info-name"></p>
        </div>
        <div class="modal-info">
            <p class="modal_type">ステータス更新</p>
            @if (session('error'))
                <p class="error">
                    {{ session('error') }}
                </p>
            @endif
            <form action="{{ route('board.status') }}" method="POST" class="modal-form-2">
                @csrf
                <input type="hidden" id="task_id" name="task_id">
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
    </div>
    <div class="modal-comment">
        <div class="modal-comment-1">
            <p class="comment-title">コメント一覧</p>
            <div class="comment-box">
                <div class="comment-box-img">
                    <img src="{{ auth()->user()->icon_url }}">
                </div>
                <div class="comment-content">
                </div>
            </div>
        </div>
        <form method="POST" class="comment-out" action="">
            @csrf
            <input type="hidden" name="commentable_type" id="commentable_type">
            <input type="hidden" name="commentable_id" id="commentable_id">
            <textarea name="body" class="textarea" required></textarea>
            <button type="button" class="comment-button">コメントを送信</button>
        </form>
    </div>
</div>
