import type { Task } from "../types/task";

const API_URL = "/api/tasks";

type UpdateTaskResponse = {
  task: Task;
  level: "super" | "warning" | "normal";
};

export async function updateTask(
  taskId: number,
  formData: Record<string, unknown>
): Promise<UpdateTaskResponse> {
  const res = await fetch(`${API_URL}/${taskId}`, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN":
        document
          .querySelector('meta[name="csrf-token"]')
          ?.getAttribute("content") ?? "",
    },
    body: JSON.stringify(formData),
  });

  if (!res.ok) {
    throw new Error("更新失敗");
  }

  return res.json();
}
