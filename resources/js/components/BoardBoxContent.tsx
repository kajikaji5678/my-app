import React from "react";

function BoardBoxContent({ normalTasks, warningTasks, superWarningTasks }) {
    const renderTasks = (task, type) => {
        console.log(type)
        let animation = "hover:shadow-[0_0_5px_2px_#4f4f4f]";

        if (type === "warning") {
            animation = "animate-glow2"
        }
        if (type === "superWarning") {
            animation = "animate-glow"
        }

        return (
            <div key={task.id}
                className={`h-20 rounded border border-[#C5C5C5] mt-3 p-2 transition duration-300 cursor-pointer relative ${animation}`}
                data-task-id={task.id}
                data-status-id={task.status_id}>
                <p className="py-1 px-2 text-xs text-white rounded-lg w-fit"
                    style={{ backgroundColor: task.type?.type_color }}>
                        {task.type?.type_name}
                </p>
                <p className="text-sm my-1">
                    {task.task_name}
                </p>
                <div className="flex justify-between">
                    <p className="text-xs text-[#8d8b8b]">
                        {task.created_at}
                    </p>
                </div>
            </div>
        );
    };

    return (
        <>
            {superWarningTasks.map(task => renderTasks(task, "superWarning"))}
            {warningTasks.map(task => renderTasks(task, "warning"))}
            {normalTasks.map(task => renderTasks(task, "normal"))}
        </>
    );
}

export default BoardBoxContent;