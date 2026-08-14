import BoardCardContet from "./BoardCardContent";
import { useState } from "react";
import TaskSheet from "./TaskSheet";
import type { Task } from "../types/task";
import type { Status } from "../types/statuses";
import type { EditedTasks } from "../types/EditedTasks";

type Props = {
  onOpenModal: () => void;
}

function BoardCard({ onOpenModal }: Props) {

  const root = document.getElementById('board');
  if (!root) throw new Error("board ID dont exist");
  const statuses = JSON.parse(root.dataset.statuses ?? "[]") as Status[];
  const tasks = JSON.parse(root.dataset.tasks ?? "[]") as Task[];
  const initialEditedTasks = JSON.parse(root.dataset.editedTasks ?? "[]") as EditedTasks;

  console.log(tasks[0]);

  // 状態管理
  const [selectedTask, setSelectedTask] = useState<Task | null>(null);
  const [boardTasks, setBoardTasks] = useState<EditedTasks>(initialEditedTasks);
  const [open, setOpen] = useState(false);

  //* タスク個数計算
  const statusCount: {[statusId: number]: number} = {};
  for (const level of ["super", "warning", "normal"] as const ) {
    for (const statusId in boardTasks[level]) {
      const taskList = boardTasks[level][statusId] ?? [];

      statusCount[statusId] = (statusCount[statusId] || 0) + taskList.length;
    }
  }

  // 更新された1件を適切な場所へ移動させる処理
  const handleTaskUpdated = (updatedTask: Task, level: "super" | "warning" | "normal") => {
    setBoardTasks((prev) => {
      const newTasks = structuredClone(prev);

      // 今いる場所から削除
      for (const currentlevel of ["super", "warning", "normal"] as const) {
        for (const statusId in newTasks[currentlevel]) {
          const tasks = newTasks[currentlevel][statusId] ?? [];
          newTasks[currentlevel][statusId] = tasks.filter(
            (task) => task.id !== updatedTask.id
          )
        }
      }

      // 新しい場所へ追加
      const statusId = updatedTask.status_id;

      newTasks[level][statusId] ??= [];
      newTasks[level][statusId].push(updatedTask);

      return newTasks;
    });

    setSelectedTask(updatedTask);
  }

  return (
    <div className="p-6 flex gap-4">
      {statuses.map(status => (

        <div key={status.id} className="py-3 px-4 h-auto w-80 bg-white rounded-lg gap-3 overflow-y-auto">
          <div className="flex items-center justify-between">
            <div className="flex">
              <p className="text-[15px] font-bold flex items-center gap-2">
                <span className="inline-block w-4 h-4 rounded-full" style={{ backgroundColor: status.status_color }}></span>
                {status.status_name}
              </p>
              <p className="bg-[#D9D9D9] py-1 px-4 rounded-2xl text-xs font-semibold ml-3">
                {statusCount[status.id] ?? 0}
              </p>
            </div>
            <button onClick={onOpenModal} className="mt-1 w-6 h-6 cursor-pointer">+</button>
          </div>
          <BoardCardContet key={status.id} status={status}
            superTasks={boardTasks.super[status.id] ?? []}
            warningTasks={boardTasks.warning[status.id] ?? []}
            normalTasks={boardTasks.normal[status.id] ?? []}
            //~ 未使用および子の定義づけにも関連してないため削除
            // tasks={tasks}
            onTaskClick={(task) => { setSelectedTask(task); setOpen(true); }}
          />
        </div>
      ))}

      <TaskSheet
        open={open}
        //! 応急処置で強制してます
        task={selectedTask!}
        onClose={() => setOpen(false)}
        onTaskUpdate={handleTaskUpdated}
      />
    </div>
  );
}

export default BoardCard;

