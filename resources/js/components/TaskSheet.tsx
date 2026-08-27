import type { Task } from "../types/task";
import { AnimatePresence, motion } from "motion/react"
import TaskLabel from "./TaskSheet/TaskLabel";
import TaskDescription from "./TaskSheet/TaskDescription";
import TaskCommnets from "./TaskSheet/TaskComments";
import { useState } from "react";

type Props = {
  open: boolean;
  task: Task;
  onClose: () => void;
  onTaskUpdate: (
    updatedTask: Task,
    level: "super" | "warning" | "normal"
  ) => void;
};

type Row = {
  label: string;
  value: string | undefined;
};

export default function TaskSheet({
  open,
  task,
  onClose,
  onTaskUpdate
}: Props) {

  const [detailOpen, setDetailOpen] = useState(true);

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
            <div className="p-6 h-full flex flex-col">
              {/* ヘッダー */}
              <div className="shrink-0">
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
              </div>

              <div className="mt-6 overflow-hidden flex-1 min-h-0 bg-white">
                <div className="grid grid-cols-2 gap-4 h-full min-h-0">
                  <div className="flex flex-col min-h-0">
                    <div className={`rounded-lg border-2 border-gray-200 overflow-hidden ${detailOpen ? "h-1/2" : "shrink-0"}`}>
                      <TaskLabel task={task} onTaskUpdate={onTaskUpdate} onOpenChange={setDetailOpen}/>
                    </div>
                    <div className="flex-1 min-h-0 rounded border-2 mt-6 border-gray-200 overflow-hidden">
                      <TaskDescription />
                    </div>
                  </div>
                  <div className="min-h-0">
                    {task && (
                      <TaskCommnets taskId={task.id}/>
                    )}
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


