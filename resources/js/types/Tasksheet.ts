import type { Task, TaskFormData } from "resources/js/types/task";

export type Row = {
  label: string;
  key: keyof TaskFormData | "created_at";
  value: string | number;
  type: "text" | "date" | "select";
};

export function getTaskDetailRows(task: Task): Row[] {
  return [
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
      type: "date",
    },
    {
      label: "期限日",
      key: "deadline_at",
      value: task.deadline_at.slice(0, 10),
      type: "date",
    },
    {
      label: "ステータス",
      key: "status_id",
      value: task.status.status_name,
      type: "select",
    },
    {
      label: "スケジュール",
      key: "schedule",
      value: task.schedule,
      type: "text",
    },
    {
      label: "予定時間",
      key: "estimated_time",
      value: task.estimated_time,
      type: "text",
    },
    {
      label: "実際時間",
      key: "real_time",
      value: task.real_time,
      type: "text",
    },
  ];
}
