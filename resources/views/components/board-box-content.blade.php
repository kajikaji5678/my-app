@props(['tasks', 'types'])

@foreach ($tasks as $task)
    {{-- @foreach ($types as $type)
        <div class="dynamic_box_content">
            <p class="type">
            </p>
            <p class="task_name">{{ $task->task_name }}</p>
            <p class="task_date">{{ $task->created_at }}</p>
        </div>
    @endforeach --}}
    {{ dd($types) }}
@endforeach
