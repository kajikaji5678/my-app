import type { Task } from "../types/task";

type Props = {
  status: unknown; // あとでStatus型に変更
  superTasks: Task[];
  warningTasks: Task[];
  normalTasks: Task[];
  onTaskClick: (task: Task) => void;
};

export default function BoardCardContet({
  status,
  superTasks,
  warningTasks,
  normalTasks,
  onTaskClick,
}: Props) {

  const borderColors = {
    super: "border-red-500",
    warning: "border-yellow-500",
    normal: "border-[#C5C5C5]"
  }


  const renderTasks = (tasks: Task[], level: "super" | "warning" | "normal") =>
    tasks.map((task) => (
      <div
        key={task.id}
        //! 子でカードを指定したら親に通知する
        onClick={() => onTaskClick(task)}
        className={`h-20 rounded border mt-3 p-2 cursor-pointer relative ${borderColors[level]}`}
      >
        <p
          className="py-1 px-2 text-xs rounded-lg w-fit"
          style={{ backgroundColor: task.type.type_color }}
        >
          {task.type.type_name}
        </p>

        <p className="text-sm my-1">
          {task.task_name}
        </p>

        <p className="text-xs my-1">
          {task.created_at}
        </p>
      </div>
    ));

  return (
    <>
      {renderTasks(superTasks, "super")}
      {renderTasks(warningTasks, "warning")}
      {renderTasks(normalTasks, "normal")}
    </>
  );
}
