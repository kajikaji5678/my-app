@props(['tasks'])

@foreach ($tasks as $task)
    <div class="dynamic_box_content">
        <p class="type">
            {{ $task->type->type_name }}
        </p>
        <p class="task_name">{{ $task->task_name }}</p>
        <p class="task_date">{{ $task->created_at }}</p>
    </div>
    <div id="modal" class="modal hidden">
        <form method="POST", action="{{ route('board.post') }}"></form>
    </div>
@endforeach
