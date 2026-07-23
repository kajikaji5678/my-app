import React from "react";

function renderTasks(tasks) {
  return tasks.map(task => (
    <div key={task.id}
      className="h-20 rounded border border-[#C5C5C5] mt-3 p-2 cursor-pointer relative">
      <p className="py-1 px-2 text-xs rounded-lg w-fit"
        style={{ backgroundColor: task.type.type_color }}>
        {task.type.type_name}
      </p>
      <p className="text-sm my-1">
        {task.task_name}
      </p>
      <p className="text-xs my-1">
        {task.created_at}
      </p>
    </div>
  ))
}

export default function BoardCardContet({
  status,
  superTasks,
  warningTasks,
  normalTasks
}) {

  console.log(superTasks);

  return (
    <>
      {renderTasks(superTasks)}
      {renderTasks(warningTasks)}
      {renderTasks(normalTasks)}
    </>
  )
};



