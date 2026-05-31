@props(['tasks', 'statuses'])
@foreach ($tasks as $task)
    <div class="dynamic_box_content" data-task-id="{{ $task->id }}" data-statsu-id="{{ $task->status_id }}">
        <p class="type">
            {{ $task->type->type_name }}
        </p>
        <p class="task_name">{{ $task->task_name }}</p>
        <p class="task_date">{{ $task->created_at }}</p>
    </div>
@endforeach
