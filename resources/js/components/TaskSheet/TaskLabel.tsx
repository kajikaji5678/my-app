import type { Task } from "resources/js/types/task";
import React, { useState } from "react";
import type { Status } from "resources/js/types/statuses";
import type { Categories } from "resources/js/types/categories";

// ======== Types ========

type Props = {
  task: Task;
  onUpdate: (task : Task) => void;
};

type TaskFormData = {
  category_id: number;
  deadline_at: string;
  status_id: number;
};

type Row = {
  label: string;
  key: keyof TaskFormData | "created_at";
  value: string;
  type: "text" | "data" | "select";
};


export default function TaskLabel({ task, onUpdate }: Props) {

  // ======== State ========
  const root = document.getElementById('board');
  if (!root) return;
  const statuses = JSON.parse(root.dataset.statuses ?? "[]") as Status[];
  const categories = JSON.parse(root.dataset.categories ?? "[]") as Categories[];
  console.log(categories);

  const [edit, setEdit] = useState(false);
  const [formData, setFormData] = useState<TaskFormData>({
    category_id: task.category.id,
    deadline_at: task.deadline_at.slice(0, 10),
    status_id: task.status_id,
  });

  // ======== Events ========

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  }

  const handleUpdate = async () => {
    try {
      const res = await fetch(`/api/tasks/${task.id}`, {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')?.getAttribute("content") ?? "",
        },
        body: JSON.stringify(formData)
      });

      if (!res.ok) throw new Error("更新失敗");

      const updatedTask = await res.json();
      onUpdate(updatedTask);
      setEdit(false);
    } catch (e) {
      console.error(e);
    }

  }

  // ======== Display Data ========
  const rows: Row[] = [
    {
      label: "カテゴリー",
      key: "category_id",
      value: task.category.category_name,
      type: "select",
    },
    {
      label: "作成日",
      key: "created_at",
      value: task.created_at.slice(0, 10),
      type: "data"
    },
    {
      label: "期限日",
      key: "deadline_at",
      value: task.deadline_at.slice(0, 10),
      type: "data"
    },
    {
      label: "ステータス",
      key: "status_id",
      value: task.status.status_name,
      type: "select",
    },
  ];

  // ======== function ========

  const renderInput = (row: Row) => {
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

      case "data":
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

  // ======== TSX ========

  return (
    <>
      <div className="w-full flex items-center justify-between px-4 py-3 border-b bg-gray-200">
        <h2 className="font-semibold">詳細</h2>
        <div>
          <button
            className="text-blue-600 text-sm hover:underline cursor-pointer"
            onClick={() => setEdit(!edit)}>
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
      <div className="grid grid-cols-[120px_1fr]">
        {rows.map((row) => (
          <React.Fragment key={row.key}>
            <p className="text-gray-600 px-4 py-3">
              {row.label}
            </p>
            {/* //  Pタグの入れ子は勧められてない */}
            <div className="font-semibold px-4 py-3">
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
    </>
  )
}
