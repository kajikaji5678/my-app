import type { Task, TaskFormData } from "resources/js/types/task";
import React, { useState } from "react";
import type { Status } from "resources/js/types/statuses";
import type { Categories } from "resources/js/types/categories";
import { AnimatePresence, motion } from "motion/react"
import { Accordion, AccordionItem, AccordionTrigger, AccordionContent } from "@/components/ui/accordion";
import { updateTask } from "../../api/Task";
import { getTaskDetailRows } from "../../types/Tasksheet";
import type { Row } from "../../types/Tasksheet";

// ===================== Types =========================

type Props = {
  task: Task;
  onTaskUpdate: (
    updatedTask: Task,
    level: "super" | "warning" | "normal"
  ) => void;
  onOpenChange: (open: boolean) => void;
  statuses: Status[];
  categories: Categories[];
};

export default function TaskLabel({ task, onTaskUpdate, onOpenChange, statuses, categories }: Props) {

  // ======== State ========

  const [edit, setEdit] = useState(false);
  const [msg, setMsg] = useState("");
  const [formData, setFormData] = useState<TaskFormData>({
    category_id: task.category.id,
    deadline_at: task.deadline_at.slice(0, 10),
    status_id: task.status_id,
    schedule: task.schedule,
    estimated_time: task.estimated_time,
    real_time: task.real_time,
    responsible_user_name: task.responsible_user_name,
    priority: task.priority,
  });
  const rows = getTaskDetailRows(task);

  // ====================== Events =========================
  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  }

  const handleUpdate = async () => {
    try {
      const data = await updateTask(task.id, formData);
      onTaskUpdate(data.task, data.level);
      setMsg(data.message);
    } catch (e) {
      console.error(e);
    }
  }

  //* ====================== function ====================

  const renderInput = (row: Row) => {
    ///  入力欄は編集しない
    if (row.key === "created_at") return null;
    switch (row.type) {
      case "select":
        return (
          <select
            name={row.key}
            value={formData[row.key]}
            onChange={handleChange}
            className="w-full border rounded px-2 py-1">
            {row.key === "status_id" &&
              statuses.map((status) => (
                <option key={status.id} value={status.id}>
                  {status.status_name}
                </option>
              ))}
            {row.key === "category_id" &&
              categories.map((category) => (
                <option key={category.id} value={category.id}>
                  {category.category_name}
                </option>
              ))}
          </select>
        );

      case "date":
        return (
          <input
            type="date"
            name={row.key}
            value={formData[row.key]}
            onChange={handleChange}
            className="w-full border rounded px-2 py-1"></input>
        );

      default:
        return (
          <input
            type="text"
            name={row.key}
            value={formData[row.key]}
            onChange={handleChange}
            className="w-full border rounded px-2 py-1"></input>
        )
    }
  }

  // =================== TSX ========================

  return (
    <>
      <Accordion
        type="single"
        collapsible
        defaultValue="detail"
        className="h-full"
        onValueChange={(value) => {
          onOpenChange(value === "detail")
        }}
      >
        <AccordionItem
          value="detail"
          className="h-full grid grid-rows-[auto_1fr]"
        >

          {/* ヘッダー */}
          {msg && <div>{msg}</div>}
          <div className="w-full shrink-0 flex items-center justify-between px-4 py-3 border-b bg-gray-200">
            <AccordionTrigger className="p-0 hover:no-underline">
              <h2 className="font-semibold">
                詳細
              </h2>
            </AccordionTrigger>

            <div>
              <button
                className="text-blue-600 text-sm hover:underline cursor-pointer"
                onClick={() => setEdit(!edit)}
              >
                {edit ? "キャンセル" : "編集"}
              </button>

              {edit && (
                <button
                  className="ml-3 text-green-600 text-sm hover:underline cursor-pointer"
                  onClick={handleUpdate}
                >
                  変更
                </button>
              )}
            </div>
          </div>

          {/* 詳細内容 */}
          <AccordionContent className="p-0 text-base">
            <motion.div
              initial={{ opacity: 0, y: -5 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.2 }}
              className="max-h-[300px] overflow-y-auto"
            >
              <div className="grid grid-cols-[120px_1fr]">
                {rows.map((row) => (
                  <React.Fragment key={row.key}>
                    <p className="text-gray-600 px-4 py-2 !mb-0">
                      {row.label}
                    </p>

                    <div className="font-semibold px-4 py-2 m-0">
                      {edit && row.key !== "created_at" ? (
                        renderInput(row)
                      ) : (
                        <p className="font-semibold">
                          {row.value}
                        </p>
                      )}
                    </div>
                  </React.Fragment>
                ))}
              </div>
            </motion.div>
          </AccordionContent>

        </AccordionItem>
      </Accordion>
    </>
  )
}
