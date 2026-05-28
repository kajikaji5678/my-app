@props(['tasks', 'statuses'])
@foreach ($tasks as $task)
    <div class="dynamic_box_content openModal2">
        <p class="type">
            {{ $task->type->type_name }}
        </p>
        <p class="task_name">{{ $task->task_name }}</p>
        <p class="task_date">{{ $task->created_at }}</p>
    </div>
@endforeach
<div class="modal2 hidden" id="modal2">
    <div class="overlay"></div>
    <form method="POST" action="{{ route('board.status') }}">
        <button type="submit">ステータス変更</button>
    </form>
</div>
