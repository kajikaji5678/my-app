@props(['assigns'])

@foreach ($assigns as $assign => $assignGroups)
    @php
        $first = $assignGroups->first();
        $members = [];
    @endphp
    @foreach ($assignGroups as $assignGroup)
        @php
            array_push($members, $assignGroup->user->name);
        @endphp
    @endforeach

    <div class="assign-content">
        <div class="assign-content-block">
            <p class="assign-content-title">アサイン名</p>
            <p class="assign-content-p">{{ $first->assign_name }}</p>
        </div>
        <div class="assign-content-block">
            <p class="assign-content-title">内容</p>
            <p class="assign-content-p">{{ $first->assign_content }}</p>
        </div>
        <div class="assign-content-block">
            <p class="assign-content-title">募集開始時刻</p>
            <p class="assign-content-p">{{ $first->start_time }}</p>
        </div>
        <div class="assign-content-block">
            <p class="assign-content-title">募集終了時刻</p>
            <p class="assign-content-p">{{ $first->end_time }}</p>
        </div>
        <div class="assign-content-block">
            <p class="assign-content-title">対象者</p>
            @foreach ($members as $member)
                <p class="assign-content-p">{{ $member }}</p>
            @endforeach
        </div>
    </div>
@endforeach

{{-- コミット目標 --}}
