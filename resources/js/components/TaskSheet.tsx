import type { Task } from "../types/task";

type Props = {
  open: boolean;
  task: Task | null;
  onClose: () => void;
};

type Row = {
  label: string;
  value: string | undefined;
}

export default function TaskSheet({
  open,
  task,
  onClose
}: Props) {

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
    }
  ]

  return (
    <>
      {open && (
        <div
          className="fixed inset-0 z-40 bg-black/40"
          onClick={onClose}>
          <div
            className="fixed top-0 right-0 h-full w-[500px] bg-white z-50 shadow-xl"
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
              <div className="mt-6 border rounded-lg overflow-hidden bg-white">
                <div className="flex items-center justify-between px-4 py-3 border-b bg-gray-200">
                  <h2 className="font-semibold">詳細</h2>
                  <button className="text-blue-600 text-sm hover:underline cursor-pointer">編集</button>
                </div>
                <div className="grid grid-cols-[120px_1fr]">
                  {rows.map((row: Row) => (
                    <>
                      <p className="text-gray-600 px-4 py-3">
                        {row.label}
                      </p>
                      <p className="font-semibold px-4 py-3">
                        {row.value}
                      </p>
                    </>
                  ))}
                </div>
              </div>
            </div>
          </div>
        </div>
      )}
    </>
  )
}
