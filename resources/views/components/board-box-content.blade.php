@props(['normalTasks', 'warningTasks','statuses', 'superWarningTasks', 'types'])

@foreach ($superWarningTasks as $task)
    <div class="dynamic_box_content h-[84px] rounded border border-[#C5C5C5] mt-3 p-2 transition duration-300
    cursor-pointer relative animate-[glow2_1.5s_infinite]"
    data-task-id="{{ $task->id }}"
    data-statsu-id="{{ $task->status_id }}">
        <p class="py-1 px-2 text-xs text-white rounded-lg w-fit" style="background-color: {{ $task->type->type_color }}">
            {{ $task->type->type_name }}
        </p>
        <p class="text-sm my-1">{{ $task->task_name }}</p>
        <div class="flex justify-between">
            <p class="text-xs text-[#8d8b8b]">{{ $task->created_at }}</p>
            <p class="task-manager"></p>
        </div>
    </div>
@endforeach

@foreach ($warningTasks as $task)
    <div class="dynamic_box_content h-[84px] rounded border border-[#C5C5C5] mt-3 p-2 transition duration-300
    cursor-pointer relative animate-[glow_1.5s_infinite]"
    data-task-id="{{ $task->id }}"
    data-statsu-id="{{ $task->status_id }}">
        <p class="py-1 px-2  text-xs text-white rounded-lg w-fit" style="background-color: {{ $task->type->type_color }}">
            {{ $task->type->type_name }}
        </p>
        <p class="text-sm my-1">{{ $task->task_name }}</p>
        <div class="flex justify-between">
            <p class="text-xs text-[#8d8b8b]">{{ $task->created_at }}</p>
            <p class="task-manager"></p>
        </div>
    </div>
@endforeach

@foreach ($normalTasks as $task)
    <div class="dynamic_box_content h-[84px] rounded border border-[#C5C5C5] mt-3 p-2 transition duration-300
    cursor-pointer relative hover:shadow-[0_0_5px_2px_#4f4f4f]" data-task-id="{{ $task->id }}" data-statsu-id="{{ $task->status_id }}">
        <p class="py-1 px-2 text-xs text-white rounded-lg w-fit" style="background-color: {{ $task->type->type_color }}">
            {{ $task->type->type_name }}
        </p>
        <p class="text-sm my-1">{{ $task->task_name }}</p>
        <div class="flex justify-between">
            <p class="text-xs text-[#8d8b8b]">{{ $task->created_at }}</p>
            <p class="task-manager"></p>
        </div>
    </div>
@endforeach
