import BoardCardContet from "./BoardCardContent";
import { useEffect, useState } from "react";
import TaskSheet from "./TaskSheet";
import type { Task } from "../types/task";
import type { Status } from "../types/statuses";
import type { EditedTasks } from "../types/EditedTasks";
import type { Categories } from "../types/categories";
import { useProject } from "../context/Projectcontext";
import TaskCreateModal from "./TaskCreate/TaskCreate";

type BoardData = {
  tasks: Task[];
  statuses: Status[];
  editedTasks: EditedTasks;
  categories: Categories[];
}

type Props = {
  onOpenModal?: () => void;
}

function BoardCard({ onOpenModal }: Props) {

  const { selectedProjectId } = useProject();

  // 状態管理
  const [boardData, setBoardData] = useState<BoardData | null>(null)
  const [selectedTask, setSelectedTask] = useState<Task | null>(null);
  const [open, setOpen] = useState(false);
  const [boardTasks, setBoardTasks] = useState<EditedTasks | null>(null);
  const [taskCreateModalOpen, setTaskCreateModalOpen] = useState(false);

  //* プロジェクトが変わったら再度取得
  useEffect(() => {
    const fetchBoard = async () => {
      const response = await fetch(`/api/projects/${selectedProjectId}/board`);
      if (!response.ok) throw new Error("Board情報の取得に失敗しました");
      const data = await response.json();
      setBoardData(data.data);
      setBoardTasks(data.data.editedTasks);
    };
    fetchBoard();
  }, [selectedProjectId]);

  //* タスクモーダルを開く処理（お知らせから）
  useEffect(() => {
    const handleOpenTask = (event: Event) => {
      const customEvent = event as CustomEvent<{ taskId: number; commentId: number }>;
      const { taskId, commentId } = customEvent.detail;
      if (!boardData) return;
      const task = boardData.tasks.find((task) => task.id === taskId);
      if (!task) return;
      setSelectedTask(task);
      setOpen(true);
    };
    window.addEventListener("open-task", handleOpenTask);
    return () => {
      window.removeEventListener("open-task", handleOpenTask);
    };
  }, [boardData]);

  if (!boardData || !boardTasks) {
    return <div>Loading...</div>;
  }

  const { tasks, statuses, categories } = boardData;

  //* タスク個数計算
  /// 件数保存する箱を準備
  /// レベル分け->ステータス分けという順番
  /// 状態変化というよりはプログラミングの本質と思ってくれていいだろう
  const statusCount: { [statusKey: string]: number } = {};
  for (const level of ["super", "warning", "normal"] as const) {
    for (const statusKey in boardTasks[level]) {
      const taskList = boardTasks[level][statusKey] ?? [];
      statusCount[statusKey] = (statusCount[statusKey] || 0) + taskList.length;
    }
  }

  // 更新された1件を適切な場所へ移動させる処理
  const handleTaskUpdated = (updatedTask: Task, level: "super" | "warning" | "normal") => {
    setBoardTasks((prev) => {
      if (!prev) return prev;
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
      const statusKey = `status_${updatedTask.status_id}`;

      newTasks[level][statusKey] ??= [];
      newTasks[level][statusKey].push(updatedTask);

      return newTasks;
    });

    setSelectedTask(updatedTask);
  }

  return (
    <>
      <div className="p-6 flex gap-4 max-[1200px]:overflow-x-auto">
        {statuses.map(status => (

          <div key={status.id} className="shrink-0 py-3 px-4 h-auto w-80 bg-white rounded-lg gap-3 overflow-y-auto">
            <div className="flex items-center justify-between">
              <div className="flex">
                <p className="text-[15px] font-bold flex items-center gap-2">
                  <span className="inline-block w-4 h-4 rounded-full" style={{ backgroundColor: status.status_color }}></span>
                  {status.status_name}
                </p>
                <p className="bg-[#D9D9D9] py-1 px-4 rounded-2xl text-xs font-semibold ml-3">
                  {statusCount[`status_${status.id}`] ?? 0}
                </p>
              </div>
              <button onClick={() => setTaskCreateModalOpen(true)} className="mt-1 w-6 h-6 cursor-pointer">+</button>
            </div>
            <BoardCardContet key={status.id} status={status}
              superTasks={boardTasks.super[`status_${status.id}`] ?? []}
              warningTasks={boardTasks.warning[`status_${status.id}`] ?? []}
              normalTasks={boardTasks.normal[`status_${status.id}`] ?? []}
              //~ 未使用および子の定義づけにも関連してないため削除
              // tasks={tasks}
              onTaskClick={(task) => { setSelectedTask(task); setOpen(true); console.log(task) }}
            />
          </div>
        ))}

        <TaskSheet
          open={open}
          //! 応急処置で強制してます
          task={selectedTask!}
          onClose={() => setOpen(false)}
          onTaskUpdate={handleTaskUpdated}
          statuses={statuses}
          categories={categories}
        />
      </div>
      <TaskCreateModal
        open={taskCreateModalOpen}
        onOpenChange={setTaskCreateModalOpen}
      />
    </>
  );
}

export default BoardCard;

