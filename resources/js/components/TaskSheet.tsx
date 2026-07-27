import type { Task } from "../types/task";
import { AnimatePresence, motion } from "motion/react"
import { updateTask } from "../api/Task";
import TaskLabel from "./TaskSheet/TaskLabel";
import TaskDescription from "./TaskSheet/TaskDescription";
import TaskCommnets from "./TaskSheet/TaskComments";

type Props = {
  open: boolean;
  task: Task | null;
  onClose: () => void;
};

type Row = {
  label: string;
  value: string | undefined;
};

export default function TaskSheet({
  open,
  task,
  onClose
}: Props) {

  const saveTask = async () => {
    try {
      await updateTask({
      });
    } catch (e) {
      console.log(e);
    }
  }

  const rows: Row[] = [
    {
      label: "カテゴリー",
      value: task?.category.category_name
    },
    {
      label: "作成日",
      value: task?.created_at.slice(0, 10),
    },
    {
      label: "期限日",
      value: task?.deadline_at
    },
    {
      label: "優先度",
      value: task?.priority
    },
    {
      label: "ステータス",
      value: task?.status.status_name
    }
  ]

  return (
    <AnimatePresence>
      {open && (
        <motion.div
          className="fixed inset-0 z-40 bg-black/40"
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          exit={{ opacity: 0 }}
          transition={{ duration: 0.3 }}
          onClick={onClose}>
          <motion.div
            className="task-sheet fixed top-0 right-0 h-full w-[800px] bg-white z-50 shadow-xl"
            initial={{ x: "100%" }}
            animate={{ x: 0 }}
            exit={{ x: "100%" }}
            transition={{
              duration: 0.3,
              ease: "easeOut"
            }}
            onClick={(e) => e.stopPropagation()}
          >
            <div className="p-6">
              <button
                onClick={onClose}
                className="mb-4">
                ×
              </button>
              <p
                className="w-fit px-3 py-1 rounded-lg"
                style={{ backgroundColor: task?.type.type_color }}
              >
                {task?.type.type_name}
              </p>
              <p className="text-2xl font-bold mt-4">
                {task?.task_name}
              </p>
              <div className="mt-6 overflow-hidden bg-white">
                <div className="grid grid-cols-2 gap-4">
                  <div>
                    <div className="rounded-lg border-2 border-gray-200 overflow-hidden">
                      <TaskLabel rows={rows} />
                    </div>
                    <div className="rounded border-2 mt-6 border-gray-200 overflow-hidden">
                      <TaskDescription />
                    </div>
                  </div>
                  <div>
                    <TaskCommnets />
                  </div>
                </div>
              </div>
            </div>
          </motion.div>
        </motion.div>
      )}
    </AnimatePresence>
  )
}


