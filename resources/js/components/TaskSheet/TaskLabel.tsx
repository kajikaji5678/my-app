import type { Task } from "resources/js/types/task";
import React, { useState } from "react";

type Props = {
  task: Task;
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
  type: string;
};


export default function TaskLabel({ task }: Props) {

  //* 編集用データ
  /// 開始日を変更することなんかまずない
  const [formData, setFormData] = useState({
    category_id: task.category.id,
    deadline_at: task.deadline_at.slice(0, 10),
    status_id: task.status_id,
  });

  // 編集が出来るか否かの判定
  const [edit, setEdit] = useState(false);

  //* inputの変更をformDataに反映する処理
  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  }

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
      type: "date"
    },
    {
      label: "期限日",
      key: "deadline_at",
      value: task.deadline_at.slice(0, 10),
      type: "date"
    },
    {
      label: "ステータス",
      key: "status_id",
      value: task.status.status_name,
      type: "select",
    },
  ];

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
                <input
                  name={row.key}
                  value={formData[row.key]}
                  className="w-full border rounded px-2 py-1" />
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
