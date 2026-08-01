import React from "react";
import BoardCardContet from "./BoardCardContent";
import { useState } from "react";
import TaskSheet from "./TaskSheet";
import type { Task } from "../types/task";
import type { Status } from "../types/statuses";
import type { EditedTasks } from "../types/EditedTasks";

type Props = {
  // 引数無し戻り値無し
  onOpenModal: () => void;
}

function BoardCard({ onOpenModal }: Props) {

  //* レンダー場所指定
  const root = document.getElementById('board');
  if (!root) throw new Error("board ID dont exist");

  //* JSONの書き換え
  const statuses = JSON.parse(root.dataset.statuses ?? "[]") as Status[];
  const tasks = JSON.parse(root.dataset.tasks ?? "[]") as Task[];
  const editedTasks = JSON.parse(root.dataset.editedTasks ?? "[]") as EditedTasks;

  //* 状態管理セット
  const [selectedTask, setSelectedTask] = useState(null);
  const [open, setOpen] = useState(false);

  //* タスク個数計算
  const statusCount: {[statusId: number]: number} = {};
  tasks.forEach(task => {
    statusCount[task.status.id] = (statusCount[task.status.id] || 0) + 1;
  });

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
            superTasks={editedTasks.super[status.id] ?? []}
            warningTasks={editedTasks.warning[status.id] ?? []}
            normalTasks={editedTasks.normal[status.id] ?? []}
            //~ 未使用および子の定義づけにも関連してないため削除
            // tasks={tasks}
            onTaskClick={(task) => { setSelectedTask(task); setOpen(true); }}
          />
        </div>
      ))}

      <TaskSheet
        open={open}
        task={selectedTask}
        onClose={() => setOpen(false)}
      />
    </div>
  );
}

export default BoardCard;

