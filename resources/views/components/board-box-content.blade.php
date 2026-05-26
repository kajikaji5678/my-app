@props(['tasks'])

@foreach ($tasks as $task)
<div class="dynamic_box_content">
    <p class="type">あああ</p>
    <p class="task_name">{{ $task->task_name }}</p>
    <p class="task_date">{{ $task->created_at }}</p>
</div>
@endforeach
