@props(['assigns'])

@foreach ($assigns as $assign)
    <div class="assign-content">
        <div class="assign-content-block">
            <p class="assign-content-title">アサイン名</p>
            <p class="assign-content-p">{{ $assign->assign_name }}</p>
        </div>
        <div class="assign-content-block">
            <p class="assign-content-title">内容</p>
            <p class="assign-content-p">{{ $assign->assign_content }}</p>
        </div>
        <div class="assign-content-block">
            <p class="assign-content-title">募集開始時刻</p>
            <p class="assign-content-p">{{ $assign->start_time }}</p>
        </div>
        <div class="assign-content-block">
            <p class="assign-content-title">募集終了時刻</p>
            <p class="assign-content-p">{{ $assign->end_time }}</p>
        </div>
        <div class="assign-content-block">
            <p class="assign-content-title">対象者</p>
            <p class="assign-content-p">{{ $assign->user->name }}</p>
        </div>
    </div>
@endforeach

{{-- コミット目標 --}}