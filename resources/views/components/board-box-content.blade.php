@props(['normalTasks', 'warningTasks','statuses', 'superWarningTasks', 'types'])
@foreach ($superWarningTasks as $task)
    <div class="dynamic_box_content_superWarning" data-task-id="{{ $task->id }}" data-statsu-id="{{ $task->status_id }}">
        <p class="type"  style="background-color: {{ $task->type->type_color }}">
            {{ $task->type->type_name }}
        </p>
        <p class="task_name">{{ $task->task_name }}</p>
        <div class="task-and-manager">
            <p class="task_date">{{ $task->created_at }}</p>
            <p class="task-manager"></p>
        </div>
    </div>
@endforeach
@foreach ($warningTasks as $task)
    <div class="dynamic_box_content_warning" data-task-id="{{ $task->id }}" data-statsu-id="{{ $task->status_id }}">
        <p class="type"  style="background-color: {{ $task->type->type_color }}">
            {{ $task->type->type_name }}
        </p>
        <p class="task_name">{{ $task->task_name }}</p>
        <div class="task-and-manager">
            <p class="task_date">{{ $task->created_at }}</p>
            <p class="task-manager"></p>
        </div>
    </div>
@endforeach
@foreach ($normalTasks as $task)
    <div class="dynamic_box_content" data-task-id="{{ $task->id }}" data-statsu-id="{{ $task->status_id }}">
        <p class="type"  style="background-color: {{ $task->type->type_color }}">
            {{ $task->type->type_name }}
        </p>
        <p class="task_name">{{ $task->task_name }}</p>
        <div class="task-and-manager">
            <p class="task_date">{{ $task->created_at }}</p>
            <p class="task-manager"></p>
        </div>
    </div>
@endforeach
